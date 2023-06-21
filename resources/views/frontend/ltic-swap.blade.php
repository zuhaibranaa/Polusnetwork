@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="swap_Polus Network_tokens_main">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="stake_swap_section" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content roi-model">
                                <div class="modal-header calcul-modal-header swap_model_head">
                                    <h2 class="modal-title calcul-modale-title " id="exampleModalLabel">SWAP</h2>
                                    <p>Trade Tokens in an instance</p>
                                </div>
                                <div class="modal-body cake_stack_modale">
                                    <div class="cake_stacked_main">
                                        <div class="cake_stacked_outer">
                                            <div class="stacked_input">
                                                <div class="stacked_amount usdts_stake">
                                                    <div class="usdts_stake_label">
                                                        <label>USDTs</label>
                                                        <label>Balance: 0</label>
                                                    </div>
                                                    <input type="number" class="usd_stack" placeholder="0.0"
                                                        value="" />
                                                </div>
                                                <div class="arrow_down">
                                                    <span>&#8595;</span>

                                                </div>
                                                <div class="stacked_amount usdts_stake">
                                                    <div class="usdts_stake_label">
                                                        <label>CAKE</label>
                                                        <label>Balance: 0</label>
                                                    </div>
                                                    <input type="number" class="usd_stack" placeholder="0.0"
                                                        value="" />
                                                </div>
                                                <div class="stacked_amount usdts_stake usdts_stake_tolerance ">
                                                    <div class="usdts_stake_label">
                                                        <label>Slipage Tolerance</label>
                                                    </div>
                                                    <input type="number" class="usd_stack" placeholder="Enter An Amount"
                                                        value="" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="stake_swap_section" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content roi-model">
                                <div class="modal-header calcul-modal-header swap_model_head">
                                    <h2 class="modal-title calcul-modale-title " id="exampleModalLabel">SWAP</h2>
                                    <p>Trade Tokens in an instance</p>
                                </div>
                                <div class="modal-body cake_stack_modale">
                                    <div class="cake_stacked_main">
                                        <div class="cake_stacked_outer">
                                            <div class="stacked_input">
                                                <div class="stacked_amount usdts_stake">
                                                    <div class="usdts_stake_label">
                                                        <label>CAKE</label>
                                                        <label>Balance: 0</label>
                                                    </div>
                                                    <input type="number" class="usd_stack" placeholder="0.0"
                                                        value="" />
                                                </div>
                                                <div class="arrow_down">
                                                    <span>&#8595;</span>

                                                </div>
                                                <div class="stacked_amount usdts_stake">
                                                    <div class="usdts_stake_label">
                                                        <label>USDTs</label>
                                                        <label>Balance: 0</label>
                                                    </div>
                                                    <input type="number" class="usd_stack" placeholder="0.0"
                                                        value="" />
                                                </div>
                                                <div class="stacked_amount usdts_stake usdts_stake_tolerance ">
                                                    <div class="usdts_stake_label">
                                                        <label>Slipage Tolerance</label>
                                                    </div>
                                                    <input type="number" class="usd_stack" placeholder="Enter An Amount"
                                                        value="" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
