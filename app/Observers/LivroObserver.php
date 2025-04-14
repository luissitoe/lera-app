<?php

namespace App\Observers;

use App\Models\Livro;
use App\Models\User;
use App\Notifications\NovoLivroNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class LivroObserver
{
    /**
     * Handle the Livro "created" event.
     */
    public function created(Livro $livro): void
    {
        Log::info('Novo livro registado: ' . $livro->titulo);
        Notification::route('mail', 'app@lera.com')
            ->notify(new NovoLivroNotification($livro));
    }

    /**
     * Handle the Livro "updated" event.
     */
    public function updated(Livro $livro): void
    {
        //
    }

    /**
     * Handle the Livro "deleted" event.
     */
    public function deleted(Livro $livro): void
    {
        //
    }

    /**
     * Handle the Livro "restored" event.
     */
    public function restored(Livro $livro): void
    {
        //
    }

    /**
     * Handle the Livro "force deleted" event.
     */
    public function forceDeleted(Livro $livro): void
    {
        //
    }
}
