<?php

namespace App\Observers;

use App\Mail\RentalStatusMail;
use App\Mail\TicketMail;
use App\Models\Rent;
use Illuminate\Support\Facades\Mail;

class RentObserver
{
    /**
     * Handle the Rent "created" event.
     */
    public function created(Rent $rent): void
    {
        //

        $renter = Rent::latest()->first();

        Mail::to($renter->user->email)->send(new TicketMail());
    }

    /**
     * Handle the Rent "updated" event.
     */
    public function updated(Rent $rent): void
    {
        //
        Mail::to($rent->user->email)->send(new RentalStatusMail($rent));
    }

    /**
     * Handle the Rent "deleted" event.
     */
    public function deleted(Rent $rent): void
    {
        //
    }

    /**
     * Handle the Rent "restored" event.
     */
    public function restored(Rent $rent): void
    {
        //
    }

    /**
     * Handle the Rent "force deleted" event.
     */
    public function forceDeleted(Rent $rent): void
    {
        //
    }
}
