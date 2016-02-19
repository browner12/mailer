<?php namespace browner12\mailer;

use Illuminate\Support\ServiceProvider;

class MailerServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Boot the service provider
     *
     * @return void
     */
    public function boot()
    {
        //publish configuration
        $this->publishes([
            __DIR__ . '/config/mailer.php' => config_path('mailer.php'),
        ], 'config');
    }
}
