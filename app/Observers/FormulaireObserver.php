<?php

namespace App\Observers;

use App\Models\Formulaire;

class FormulaireObserver
{
    /**
     * Handle the Formulaire "created" event.
     */
    public function created(Formulaire $formulaire): void
    {

    }
    /**
     * Handle the Formulaire "updated" event.
     */
    public function updated(Formulaire $formulaire): void
    {
        //
    }

    /**
     * Handle the Formulaire "deleted" event.
     */
    public function deleted(Formulaire $formulaire): void
    {
        //
    }

    /**
     * Handle the Formulaire "restored" event.
     */
    public function restored(Formulaire $formulaire): void
    {
        //
    }

    /**
     * Handle the Formulaire "force deleted" event.
     */
    public function forceDeleted(Formulaire $formulaire): void
    {
        //
    }
}
