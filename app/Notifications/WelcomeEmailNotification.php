<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     private $email;
     private $password;
 
     public function __construct($email, $password)
     {
         $this->email = $email;
         $this->password = $password;
     }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Bem-vindo à Plataforma!')
            ->greeting('Olá ' . $notifiable->name . '!')
            ->line('Sua conta foi criada com sucesso. Aqui estão suas credenciais de acesso:')
            ->line('Email: ' . $this->email)
            ->line('Senha: ' . $this->password)
            ->line('Use essas informações para acessar a plataforma.')
            ->action('Acessar a Plataforma', url('/login'))
            ->line('Obrigado por se juntar a nós!')
            ->attach("asset('termo_de_uso_nnm_fp.pdf')", [
                'as' => 'Termos de Uso NNM.pdf', 
                'mime' => 'application/pdf', 
            ]);
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
