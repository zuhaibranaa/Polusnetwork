<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Subscription;

class ReleaseLockedPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'release:payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Release Locked Payments';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $subscriptions = Subscription::where('status',1)->with('user','plan')->get();
        foreach ($subscriptions as $subscription){
            if(Carbon::parse($subscription->expiry_date)->toDateString() <= Carbon::now()->toDateString()){
                $plan = $subscription->plan;
                $amount = $subscription->amount;
                $staking_currency = $plan->staking_currency;
                $subscription->user[$staking_currency] += $amount;
                $subscription->status = 0;
                $subscription->save();
                $subscription->user->save();
            }
        }
        return Command::SUCCESS;
    }
}
