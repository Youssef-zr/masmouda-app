<?php

namespace App\Observers;

use App\Models\Member;

class MemberObserver
{

    public function creating(Member $member): void
    {
        $member->amount = $member->role->salary * 12;
        $image = public_path("Bordereau_Emission_Ord__28112024.pdf");

        $member->addMedia($image)
        ->preservingOriginal()
        ->toMediaCollection(collectionName: "cin_image");
    }

    /**
     * Handle the Member "created" event.
     */
    public function created(Member $member): void
    {

    }

    public function updating(Member $member): void
    {
        $member->amount = $member->role->salary * 12;
    }

    /**
     * Handle the Member "updated" event.
     */
    public function updated(Member $member): void
    {
        //
    }

    /**
     * Handle the Member "deleted" event.
     */
    public function deleted(Member $member): void
    {
        //
    }

    /**
     * Handle the Member "restored" event.
     */
    public function restored(Member $member): void
    {
        //
    }

    /**
     * Handle the Member "force deleted" event.
     */
    public function forceDeleted(Member $member): void
    {
        //
    }
}
