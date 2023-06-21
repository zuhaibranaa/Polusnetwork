<?php

namespace App\Console\Commands;

use App\Models\Setting;
use App\Models\Subscription;
use Illuminate\Console\Command;

class GenerateRewards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:rewards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Rewards on Daily Basis';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $brain_value = floatval(Setting::where('name','brain_value')->first()->value);
        $pls_value = floatval(Setting::where('name','pls_value')->first()->value);
        $subscriptions = Subscription::where('status',1)->with('user','plan')->get();
        foreach ($subscriptions as $subscription){
            $plan = $subscription->plan;
            $amount = $subscription->amount;
            $per_day_reward = $plan->per_day_reward;
            if($plan->staking_currency === $plan->rewarding_currency){
                $generated_reward = $amount * ( $per_day_reward / 100 );
            }
            else{
                if($plan->staking_currency === 'PLS'){
                    if($plan->rewarding_currency === 'USDT'){
                        $generated_reward = ( $amount * $pls_value ) * ( $per_day_reward / 100 );
                    }
                    else{ // In Case Of Brain
                        $generated_reward = ( ( $amount * $pls_value ) / $brain_value) * ( $per_day_reward / 100 );
                    }
                }
                else if($plan->staking_currency === 'USDT'){
                    if($plan->rewarding_currency === 'PLS'){
                        $generated_reward = ( $amount / $pls_value ) * ( $per_day_reward / 100 );
                    }
                    else{ // In Case Of Brain
                        $generated_reward = ( $amount / $brain_value ) * ( $per_day_reward / 100 );
                    }
                }
                else{ // In Case Of Brain
                    if($plan->rewarding_currency === 'PLS'){
                        $generated_reward = ( ($amount * $brain_value) / $pls_value) * ( $per_day_reward / 100 );
                    }
                    else{ // In Case Of USDT
                        $generated_reward = ($amount * $brain_value) * ( $per_day_reward / 100 );
                    }
                }
            }
            $subscription->generated_rewards += $generated_reward;
            $subscription->save();
            $subscription->user->save();
        }
        return Command::SUCCESS;
    }
}
