<?php

namespace App\Observers;

use App\Models\RewardRequest;
use App\Models\User;


class RewardRequestObserver
{
    /**
     * Handle the RewardRequest "created" event.
     */
    public function created(RewardRequest $rewardRequest): void
    {
                $admins = User::where('is_admin', true)->get();
        
        // إرسال إشعار لكل مدير
        foreach ($admins as $admin) {
            $admin->notify(new NewRewardRequestNotification($request));
        }
    }

    

    /**
     * Handle the RewardRequest "updated" event.
     */
    public function updated(RewardRequest $rewardRequest): void
    {
        //
    }

    /**
     * Handle the RewardRequest "deleted" event.
     */
    public function deleted(RewardRequest $rewardRequest): void
    {
        //
    }

    /**
     * Handle the RewardRequest "restored" event.
     */
    public function restored(RewardRequest $rewardRequest): void
    {
        //
    }

    /**
     * Handle the RewardRequest "force deleted" event.
     */
    public function forceDeleted(RewardRequest $rewardRequest): void
    {
        //
    }
}
