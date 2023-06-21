<?php

namespace App\Http\Controllers;

use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class WithdrawController extends Controller
{
    private $api;

    public function __construct()
    {
        $this->api = app(\CoinpaymentsAPI::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $withdraws = DB::table('withdraws')
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at','DESC')
            ->paginate(5);
        if (auth()->user()->is_admin) {
            $withdraws = DB::table('withdraws')
                ->orderBy('created_at','DESC')
                ->paginate(5);
        }
        return Inertia::render('WithdrawList',['withdraws'=>$withdraws]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Withdraw');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount'=>'required|numeric',
            'withdrawal_address'=>'required|string'
        ]);
        if(auth()->user()->USDT >= $request->amount){
            $withdraw = Withdraw::create([
                    'user_id' => auth()->user()->id,
                    'amount' => intval($request->amount),
                    'withdrawal_address' => $request->withdrawal_address,
                    'note' => $request->note,
            ]);
            return Redirect::route('withdraw.index')
                ->with('message','Withdraw Request Created Successfully')
                ->with('key', Str::uuid()->toString())
                ->with('type','emerald');
        }else{
            return Redirect::back()
                ->with('message','Kindly check your balance')
                ->with('key', Str::uuid()->toString())
                ->with('type','red');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     */
    public function show(Withdraw $withdraw)
    {
        if(!$withdraw){
            return Redirect::back(404)
                ->with('message','No Record Found')
                ->with('key', Str::uuid()->toString())
                ->with('type','red');
        }
        return Inertia::render('SingleWithdraw',['data'=>$withdraw]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $withdraw)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        $trx = $this->api->CreateWithdrawal([
            'amount'=> $withdraw->amount,
            'currency' =>$withdraw->currency,
            'address' => $withdraw->withdrawal_address,
            'auto_confirm' => 1,
            'note' => $withdraw->note,
        ]);
        if ($trx['error'] == 'ok') {
            $withdraw->txn_id = $trx['result']['id'];
            $withdraw->status = $trx['result']['status'];
            $withdraw->save();
            return Redirect::back()
                ->with('message','Withdrawal Completed Successfully')
                ->with('key', Str::uuid()->toString())
                ->with('type','emerald');
        }else{
            return Redirect::back()
                ->with('message',$trx['error'])
                ->with('key', Str::uuid()->toString())
                ->with('type','red');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdraw  $withdraw
     */
    public function destroy(Withdraw $withdraw)
    {
        if(!$withdraw->status){
            $withdraw->delete();
            return Redirect::route('withdraw.index')
                ->with('message','Withdrawal Request Deleted Successfully')
                ->with('key', Str::uuid()->toString())
                ->with('type','emerald');
        }else{
            return Inertia::render('Abort',['code'=>404]);
        }
    }
}
