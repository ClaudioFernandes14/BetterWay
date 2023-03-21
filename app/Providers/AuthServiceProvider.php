<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // ResetPassword::toMailUsing(function($notifiable, $url)
        // {

        //     $expires = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');

        //     return (new MailMessage)
        //     ->greeting('Olá!')  
        //     ->subject('Redefinir a Password')
        //     ->line('Porfavor clique no botao abaixo para redefinir a password!')
        //     ->action('Redefinir a Password', $url)
        //     ->line('O link para redefinir a sua password vai expirar em ' . $expires . 'm.' )
        //     ->line('Se nao pediu para redefinir a password, pode voltar a pagina inicial');
            
        // });

    }


}
