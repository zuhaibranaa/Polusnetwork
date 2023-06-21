<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PlanController extends Controller
{

    public function __construct()
    {
        $this->middleware('Admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $plans = DB::table('plans')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);;
        return Inertia::render('PlansList', ['plans' => $plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => ['required', 'string'],
            'duration_days' => ['required', 'numeric'],
            'per_day_reward' => ['required', 'numeric'],
            'staking_currency' => ['required', 'in:PLS,USDT,BRAIN'],
            'rewarding_currency' => ['required', 'in:PLS,USDT,BRAIN'],
            'status' => ['required', 'boolean'],
        ]);
        $plan = Plan::create([
            'name' => $request->name,
            'duration_days' => $request->duration_days,
            'per_day_reward' => $request->per_day_reward,
            'staking_currency' => $request->staking_currency,
            'rewarding_currency' => $request->rewarding_currency,
            'status' => $request->status,
        ]);
        return Redirect::back()
            ->with('message', "Plan '$plan->name' created Successfully")
            ->with('key', Str::uuid()->toString())
            ->with('type', 'emerald');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Plan $plan
     * @return \Inertia\Response
     */
    public function show(Plan $plan)
    {
        return Inertia::render('SinglePlan', ['data' => $plan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Plan $plan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Plan $plan)
    {
        $plan->per_day_reward = $request->per_day_reward;
        $plan->status = $request->status;
        $plan->save();
        return Redirect::back()
            ->with('message', 'Plan Updated Successfully')
            ->with('key', Str::uuid()->toString())
            ->with('type', 'green');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Plan $plan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Plan $plan)
    {
        $plan->status != $plan->status;
        if ($plan->status) {
            $plan->status = false;
            $message = 'Plan Successfully Deactivated';
        } else {
            $plan->status = true;
            $message = 'Plan Successfully Activated';
        }
        $plan->save();

        return Redirect::back()
            ->with('message', $message)
            ->with('key', Str::uuid()->toString())
            ->with('type', $plan->status ? 'green' : 'red');
    }
}
