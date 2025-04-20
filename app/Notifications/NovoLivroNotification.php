<?php

namespace App\Notifications;

use App\Models\Livro;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NovoLivroNotification extends Notification
{
    use Queueable;

    public Livro $livro;

    /**
     * Create a new notification instance.
     */
    public function __construct(Livro $livro)
    {
        $this->livro = $livro;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Novo livro registado: ' . $this->livro->titulo)
            ->greeting('Olá!')
            ->line('Um novo livro foi adicionado ao sistema:')
            ->line('📖 Título: ' . $this->livro->titulo)
            ->line('🗓 Ano: ' . $this->livro->ano_publicacao)
            ->line('✍️ ISBN: ' . $this->livro->isbn)
            ->action('Ver Livro', url('/books/show/' . $this->livro->id))
            ->line('Obrigado por usar o sistema Lera!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
