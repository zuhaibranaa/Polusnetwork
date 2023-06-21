@extends('layouts.app')
@section('content')
    <!-- <section class="dashboard"> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="stake_dashboard_main_section">
                    <div class="dashboard_head">
                        <h1>Stake Your Amount</h1>
                        <h4>Select Your Desired Plans</h4>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-1">
                            <div class="row>">
                                <div class="stake_main">
                                    <div class="stake_for">
                                        <div class="stake_for_one_month">
                                            <div class="stake_head_desc">
                                                <h4>Stake Polus Network for 1 Months</h4>
                                                <p>Stake, Earn - And More</p>
                                            </div>
                                            <div class="stake_img">
                                                <img src="{{ asset('img\icon\stake_img.svg') }}" alt="stake_icon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rewards_section">
                                        <div class="reward_per_day">
                                            <p>Rewards Per Day </p>
                                            <p>0.2% <img data-toggle="modal" data-target="#exampleModal"
                                                    class="reward_calculs" src="{{ asset('/img/icon/calcul.png') }}"
                                                    alt="calculator"></p>
                                        </div>
                                        <div class="reward_per_month">
                                            <p>Rewards Per Month </p>
                                            <p>Up to 6% <img data-toggle="modal" data-target="#exampleModal"
                                                    class="reward_calculs" src="{{ asset('/img/icon/calcul.png') }}"
                                                    alt="calculator"></p>
                                        </div>
                                    </div>
                                    <div class="start_earning_sec">
                                        <p><b>Start Earning</b> </p>
                                        <button class="connect_Wallet">Connect Wallet</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-1">
                            <div class="row>">
                                <div class="stake_main">
                                    <div class="stake_for">
                                        <div class="stake_for_one_month">
                                            <div class="stake_head_desc">
                                                <h4>Stake Polus Network for 3 Months</h4>
                                                <p>Stake, Earn - And More</p>
                                            </div>
                                            <div class="stake_img">
                                                <img src="{{ asset('img\icon\stake_img.svg') }}" alt="stake_icon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rewards_section">
                                        <div class="reward_per_day">
                                            <p>Rewards Per Day </p>
                                            <p>0.3% <img data-toggle="modal" data-target="#forthreemonths"
                                                    class="reward_calculs" src="{{ asset('/img/icon/calcul.png') }}"
                                                    alt="calculator"></p>
                                        </div>
                                        <div class="reward_per_month">
                                            <p>Rewards Per Month </p>
                                            <p>Up to 9% <img data-toggle="modal" data-target="#forthreemonths"
                                                    class="reward_calculs" src="{{ asset('/img/icon/calcul.png') }}"
                                                    alt="calculator"></p>
                                        </div>
                                    </div>
                                    <div class="start_earning_sec">
                                        <p><b>Start Earning</b> </p>
                                        <button class="connect_Wallet">Connect Wallet</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-1">
                            <div class="row>">
                                <div class="stake_main">
                                    <div class="stake_for">
                                        <div class="stake_for_one_month">
                                            <div class="stake_head_desc">
                                                <h4>Stake Polus Network for 6 Months</h4>
                                                <p>Stake, Earn - And More</p>
                                            </div>
                                            <div class="stake_img">
                                                <img src="{{ asset('img\icon\stake_img.svg') }}" alt="stake_icon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rewards_section">
                                        <div class="reward_per_day">
                                            <p>Rewards Per Day </p>
                                            <p>0.4% <img data-toggle="modal" data-target="#forsixmonth"
                                                    class="reward_calculs" src="{{ asset('/img/icon/calcul.png') }}"
                                                    alt="calculator"></p>
                                        </div>
                                        <div class="reward_per_month">
                                            <p>Rewards Per Month </p>
                                            <p>Up to 12% <img data-toggle="modal" data-target="#forsixmonth"
                                                    class="reward_calculs" src="{{ asset('/img/icon/calcul.png') }}"
                                                    alt="calculator"></p>
                                        </div>
                                    </div>
                                    <div class="start_earning_sec">
                                        <p><b>Start Earning</b> </p>
                                        <button class="connect_Wallet">Connect Wallet</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-1">
                            <div class="row>">
                                <div class="stake_main">
                                    <div class="stake_for">
                                        <div class="stake_for_one_month">
                                            <div class="stake_head_desc">
                                                <h4>Stake Polus Network for 1 year</h4>
                                                <p>Stake, Earn - And More</p>
                                            </div>
                                            <div class="stake_img">
                                                <img src="{{ asset('img\icon\stake_img.svg') }}" alt="stake_icon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rewards_section">
                                        <div class="reward_per_day">
                                            <p>Rewards Per Day </p>
                                            <p>0.7% <img data-toggle="modal" data-target="#foroneyear"
                                                    class="reward_calculs" src="{{ asset('img/icon/calcul.png') }}"
                                                    alt="calculator"></p>
                                        </div>
                                        <div class="reward_per_month">
                                            <p>Rewards Per Month </p>
                                            <p>Up to 21% <img data-toggle="modal" data-target="#forsixmonth"
                                                    class="reward_calculs" src="{{ asset('img/icon/calcul.png') }}"
                                                    alt="calculator"></p>
                                        </div>
                                    </div>
                                    <div class="start_earning_sec">
                                        <p><b>Start Earning</b> </p>
                                        <button class="connect_Wallet">Connect Wallet</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Content  -->





        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                Launch demo modal
                                            </button> -->


    </div>
@endsection
@section('belowfooter')
    <!-- </section> -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content roi-model">
                <div class="modal-header calcul-modal-header">
                    <h5 class="modal-title calcul-modale-title" id="exampleModalLabel">Bronze Plan</h5>
                </div>
                <div class="modal-body cake_stack_modale">
                    <div class="cake_stacked_main">
                        <h4>Cake Stacked</h4>
                        <div class="cake_stacked_outer">
                            <div class="stacked_input">
                                <div class="stacked_amount">
                                    <label>Amount in USD</label>
                                    <input type="number" class="usd_stack" id="stack_one_month" placeholder="0"
                                        value="" />
                                </div>
                                <div class="stacked_amount">

                                    <label>Amount in Cake</label>
                                    <input type="number" class="cake_stack" disabled id="stack_one_month_result"
                                        placeholder="0.00" value="" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="cake_stacked_main">
                        <h4>Stacked For</h4>
                        <div class="cake_stacked_outer cake_stack_duration">
                            <div class="stacked_duration">
                                <ul>
                                    <li><a href="#"> 1M</a></li>
                                    <li><a href="#">2M</a></li>
                                    <li><a href="#">3M</a></li>
                                    <li><a href="#">6M</a></li>
                                    <li><a href="#">1Y</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- toggle for 3 months -->

    <div class="modal fade" id="forthreemonths" tabindex="-1" role="dialog" aria-labelledby="forthreemonthsLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content roi-model">
                <div class="modal-header calcul-modal-header">
                    <h5 class="modal-title calcul-modale-title" id="forthreemonthsLabel">Silver Plan</h5>
                </div>
                <div class="modal-body cake_stack_modale">
                    <div class="cake_stacked_main">
                        <h4>Cake Stacked</h4>
                        <div class="cake_stacked_outer">
                            <div class="stacked_input">
                                <div class="stacked_amount">
                                    <label>Amount in USD</label>
                                    <input type="number" class="usd_stack" id="stack_three_month" placeholder="0"
                                        value="" />
                                </div>
                                <div class="stacked_amount">

                                    <label>Amount in Cake</label>
                                    <input type="number" class="cake_stack" disabled id="stack_three_month_result"
                                        placeholder="0.00" value="" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="cake_stacked_main">
                        <h4>Stacked For</h4>
                        <div class="cake_stacked_outer cake_stack_duration">
                            <div class="stacked_duration">
                                <ul>
                                    <li><a href="#"> 1M</a></li>
                                    <li><a href="#">2M</a></li>
                                    <li><a href="#">3M</a></li>
                                    <li><a href="#">6M</a></li>
                                    <li><a href="#">1Y</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- toggle for 3 months -->




    <!-- toggle for 6 months -->

    <div class="modal fade" id="forsixmonth" tabindex="-1" role="dialog" aria-labelledby="forsixmonthLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content roi-model">
                <div class="modal-header calcul-modal-header">
                    <h5 class="modal-title calcul-modale-title" id="forsixmonthLabel">Gold Plan</h5>
                </div>
                <div class="modal-body cake_stack_modale">
                    <div class="cake_stacked_main">
                        <h4>Cake Stacked</h4>
                        <div class="cake_stacked_outer">
                            <div class="stacked_input">
                                <div class="stacked_amount">
                                    <label>Amount in USD</label>
                                    <input type="number" class="usd_stack" id="stack_six_month" placeholder="0"
                                        value="" />
                                </div>
                                <div class="stacked_amount">

                                    <label>Amount in Cake</label>
                                    <input type="number" class="cake_stack" disabled id="stack_six_month_result"
                                        placeholder="0.00" value="" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="cake_stacked_main">
                        <h4>Stacked For</h4>
                        <div class="cake_stacked_outer cake_stack_duration">
                            <div class="stacked_duration">
                                <ul>
                                    <li><a href="#"> 1M</a></li>
                                    <li><a href="#">2M</a></li>
                                    <li><a href="#">3M</a></li>
                                    <li><a href="#">6M</a></li>
                                    <li><a href="#">1Y</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- toggle for 6 months -->





    <!-- toggle for 1 year -->

    <div class="modal fade" id="foroneyear" tabindex="-1" role="dialog" aria-labelledby="foroneyearLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content roi-model">
                <div class="modal-header calcul-modal-header">
                    <h5 class="modal-title calcul-modale-title" id="foroneyearLabel">Diamond Plan</h5>
                </div>
                <div class="modal-body cake_stack_modale">
                    <div class="cake_stacked_main">
                        <h4>Cake Stacked</h4>
                        <div class="cake_stacked_outer">
                            <div class="stacked_input">
                                <div class="stacked_amount">
                                    <label>Amount in USD</label>
                                    <input type="number" class="usd_stack" id="stack_one_year" placeholder="0"
                                        value="" />
                                </div>
                                <div class="stacked_amount">

                                    <label>Amount in Cake</label>
                                    <input type="number" class="cake_stack" disabled id="stack_one_year_result"
                                        placeholder="0.00" value="" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="cake_stacked_main">
                        <h4>Stacked For</h4>
                        <div class="cake_stacked_outer cake_stack_duration">
                            <div class="stacked_duration">
                                <ul>
                                    <li><a href="#"> 1M</a></li>
                                    <li><a href="#">2M</a></li>
                                    <li><a href="#">3M</a></li>
                                    <li><a href="#">6M</a></li>
                                    <li><a href="#">1Y</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- toggle for 3 months -->




    <!-- toggle for 6 months -->

    <div class="modal fade" id="forsixmonth" tabindex="-1" role="dialog" aria-labelledby="forsixmonthLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content roi-model">
                <div class="modal-header calcul-modal-header">
                    <h5 class="modal-title calcul-modale-title" id="forsixmonthLabel">Gold Plan</h5>
                </div>
                <div class="modal-body cake_stack_modale">
                    <div class="cake_stacked_main">
                        <h4>Cake Stacked</h4>
                        <div class="cake_stacked_outer">
                            <div class="stacked_input">
                                <div class="stacked_amount">
                                    <label>Amount in USD</label>
                                    <input type="number" class="usd_stack" id="stack_six_month" placeholder="0"
                                        value="" />
                                </div>
                                <div class="stacked_amount">

                                    <label>Amount in Cake</label>
                                    <input type="number" class="cake_stack" disabled id="stack_six_month_result"
                                        placeholder="0.00" value="" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="cake_stacked_main">
                        <h4>Stacked For</h4>
                        <div class="cake_stacked_outer cake_stack_duration">
                            <div class="stacked_duration">
                                <ul>
                                    <li><a href="#"> 1M</a></li>
                                    <li><a href="#">2M</a></li>
                                    <li><a href="#">3M</a></li>
                                    <li><a href="#">6M</a></li>
                                    <li><a href="#">1Y</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- toggle for 6 months -->





    <!-- toggle for 1 year -->

    <div class="modal fade" id="foroneyear" tabindex="-1" role="dialog" aria-labelledby="foroneyearLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content roi-model">
                <div class="modal-header calcul-modal-header">
                    <h5 class="modal-title calcul-modale-title" id="foroneyearLabel">Diamond Plan</h5>
                </div>
                <div class="modal-body cake_stack_modale">
                    <div class="cake_stacked_main">
                        <h4>Cake Stacked</h4>
                        <div class="cake_stacked_outer">
                            <div class="stacked_input">
                                <div class="stacked_amount">
                                    <label>Amount in USD</label>
                                    <input type="number" class="usd_stack" id="stack_one_year" placeholder="0"
                                        value="" />
                                </div>
                                <div class="stacked_amount">

                                    <label>Amount in Cake</label>
                                    <input type="number" class="cake_stack" disabled id="stack_one_year_result"
                                        placeholder="0.00" value="" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="cake_stacked_main">
                        <h4>Stacked For</h4>
                        <div class="cake_stacked_outer cake_stack_duration">
                            <div class="stacked_duration">
                                <ul>
                                    <li><a href="#"> 1M</a></li>
                                    <li><a href="#">2M</a></li>
                                    <li><a href="#">3M</a></li>
                                    <li><a href="#">6M</a></li>
                                    <li><a href="#">1Y</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- toggle for 1 year -->
@endsection
