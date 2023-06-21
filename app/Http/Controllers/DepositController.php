<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class DepositController extends Controller
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
        $deposits = DB::table('deposits')
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at','DESC')
            ->paginate(5);
        if (auth()->user()->is_admin) {
            $deposits = DB::table('deposits')
                ->orderBy('created_at','DESC')
                ->paginate(5);
        }
        return Inertia::render('DepositList', ['deposit' => $deposits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Deposit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $deposit = new Deposit();
        $deposit->user_id = auth()->user()->id;
        $deposit->amount = $request->deposit_amount;
        $deposit->save();
        $trx = $this->api->CreateComplexTransaction(
            $request->deposit_amount,
            'USDT.BEP20',
            'USDT.BEP20',
            auth()->user()->email,
            '',
            auth()->user()->name,
            '',
            '',
            '',
            '',
            route('deposit.update', ['deposit' => $deposit])
        );
        if ($trx['error'] == 'ok') {
            $deposit->txn_id = $trx['result']['txn_id'];
            $deposit->deposit_address = $trx['result']['address'];
            $deposit->timeout = $trx['result']['timeout'];
            $deposit->checkout_url = $trx['result']['checkout_url'];
            $deposit->status_url = $trx['result']['status_url'];
            $deposit->qrcode_url = $trx['result']['qrcode_url'];
            $deposit->save();
            return Redirect::route('deposit.show',[$deposit->id])
                ->with('message', 'Deposit Created Successfully')
                ->with('type', 'emerald')
                ->with('data', $trx);
        } else {
            $deposit->delete();
            return Redirect::back()
            ->with('message',$trx['error'])
            ->with('key', Str::uuid()->toString())
            ->with('type', 'red');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Deposit $deposit
     * @return \Inertia\Response
     */
    public function show(Deposit $deposit)
    {
        return Inertia::render('DepositSingle', ['data' => $deposit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Deposit $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Deposit $deposit
     */
    public function update(Request $request, Deposit $deposit)
    {
        $status = $this->api->GetTxInfoSingle($deposit->txn_id);
        if ($status['error'] === 'ok') {
            if ($status['result']['status'] === 1) {
                $deposit->user()->USDT = $deposit->user()->USDT + floatval($status['result']['receivedf']);
            }
            $deposit->status = $status['result']['status'];
            $deposit->save();
            return Redirect::back()
                ->with('message', $status['result']['status_text'])
                ->with('key', Str::uuid()->toString())
                ->with('type', 'emerald');
        } else {
            return Redirect::back()
                ->with('message', $status['error'])
                ->with('key', Str::uuid()->toString())
                ->with('type', 'red');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Deposit $deposit
     */
    public function destroy(Deposit $deposit)
    {
        if (auth()->user()->is_admin) {
            $deposit->delete();
            return Redirect::back()
                ->with('message', 'Deposit Deleted Successfully')
                ->with('key', Str::uuid()->toString())
                ->with('type', 'emerald');
        } else {
            return Inertia::render('Abort', ['code' => 404, 'message'=>'INVALID PERMISSIONS']);
        }
    }
}
