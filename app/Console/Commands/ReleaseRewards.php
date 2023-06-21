<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ReleaseRewards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'release:rewards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $subscriptions = Subscription::where('status',1)->with('user','plan')->get();
        foreach ($subscriptions as $subscription){
            $subscription->user[$subscription->plan->rewarding_currency] += $subscription->generated_rewards;
            $subscription->generated_rewards = 0;
            $subscription->save();
            $subscription->user->save();
        }
        return Command::SUCCESS;
    }
}
