<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\{Subscription, Plan};
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'Admin'])->only(['destroy','update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        if (auth()->user()->is_admin) {
            $plans = Subscription::with('plan', 'user')
                ->orderBy('created_at', 'DESC')
                ->paginate(5);;
            return Inertia::render('StakingList', ['plans' => $plans]);
        } else {
            $plans = Subscription::where('user_id',auth()->id())->with('plan', 'user')
                ->orderBy('created_at', 'DESC')
                ->paginate(5);;
            return Inertia::render('StakingList', ['plans' => $plans]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $plans = DB::table('plans')
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        return Inertia::render('Stake', ['plans' => $plans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'plan' => 'required|numeric',
        ]);
        $plan = Plan::find($request->plan);
        if (auth()->user()[$plan->staking_currency] >= $request->amount) {
            auth()->user()[$plan->staking_currency] -= $request->amount;
            auth()->user()['LOCKED_' . $plan->staking_currency] += $request->amount;
            auth()->user()->save();
            $subscription = Subscription::create([
                'user_id' => auth()->user()->id,
                'plan_id' => $request->plan,
                'subscription_date' => Carbon::now(),
                'expiry_date' => Carbon::now()->addDays($plan->duration_days),
                'status' => true,
                'amount' => $request->amount
            ]);
            return Redirect::route('stake.index')
                ->with('message', 'Staking Done Successfully')
                ->with('type', 'emerald')
                ->with('data', $subscription);
        }
        return Redirect::back()
            ->with('message', 'Staking Failed')
            ->with('type', 'red')
            ->with('data', '');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subscription $subscription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $subscription)
    {
        $subscription = Subscription::find($subscription);
        $subscription->user[$subscription->plan->rewarding_currency] += $subscription->generated_rewards;
        $subscription->generated_rewards = 0;
        $subscription->save();
        $subscription->user->save();
        return Redirect::back()
            ->with('message', 'Reward Released Successfully')
            ->with('type', 'emerald')
            ->with('data', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subscription $subscription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return Redirect::back()
            ->with('message', 'Staking Deleted Successfully')
            ->with('type', 'red')
            ->with('data', '');
    }
}
