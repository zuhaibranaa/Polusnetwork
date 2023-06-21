<?php

namespace App\Http\Controllers;

use App\Models\Swap;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class SwapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Swap');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $brain_value = floatval(Setting::where('name','brain_value')->first()->value);
        $pls_value = floatval(Setting::where('name','pls_value')->first()->value);
        $from = $request->from;
        $to = $request->to;
        if($to === 'BRAIN'){
            return Redirect::back()
            ->with('message',"Swapping to 'BRAIN' is not allowed")
            ->with('key', Str::uuid()->toString())
            ->with('type', 'red');
        }
        $from_value = floatval($request->from_value);
        $to_value = floatval($request->to_value);
        $user = auth()->user();
        if($from_value <= $user[$from]){
            switch ($from) {
                case 'PLS':
                    if($to === 'USDT'){
                        $to_value = $from_value * $pls_value;
                    }
                    break;

                case 'USDT':
                    if($to === 'PLS'){
                        $to_value = $from_value / $pls_value;
                    }
                    break;

                default: // in Case Of Brain
                    if($to === 'PLS'){
                        $to_value = ($from_value * $brain_value) / $pls_value ;
                    }else if($to === 'USDT'){
                        $to_value = $from_value * $brain_value;
                    }
                    break;
            }
            $swap = Swap::create([
                'from_account' => $from,
                'to_account' => $to,
                'from_amount' => $from_value,
                'to_amount' => $to_value,
                'user_id' => auth()->user()->id
            ]);
            if($swap){
                $user[$from] = floatval($user[$from]) - floatval($from_value);
                $user[$to] = floatval($user[$to]) + floatval($to_value);
                $user->save();
            }
            return Redirect::route('swap.index')
            ->with('message','Swap Done Successfully')
            ->with('key', Str::uuid()->toString())
            ->with('type', 'emerald');
        }else{
            return Redirect::back()
            ->with('message','User Balance Not Sufficient For This Transaction')
            ->with('key', Str::uuid()->toString())
            ->with('type', 'red');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Swap  $swap
     * @return \Illuminate\Http\Response
     */
    public function show(Swap $swap)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Swap  $swap
     * @return \Illuminate\Http\Response
     */
    public function edit(Swap $swap)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Swap  $swap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Swap $swap)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Swap  $swap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Swap $swap)
    {
        abort(404);
    }
}
