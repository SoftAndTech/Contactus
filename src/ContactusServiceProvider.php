<?php
namespace SoftAndTech\Contactus;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use SoftAndTech\Contactus\Models\ContactUsSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use SoftAndTech\Contactus\Http\Controllers\ContactUsController;
use SoftAndTech\Contactus\Http\Controllers\ContactUsSettingsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
use SoftAndTech\Contactus\Http\Middleware\CheckContactUsSettings;

/**
 * ContactusServiceProvider
 *
 * This service provider is responsible for bootstrapping the contact us package.
 * It loads routes, views, migrations, and publishes configuration files.
 */
class ContactusServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'contactus');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // $this->mergeConfigFrom(
        //     __DIR__ . '/config/conf_contactUs.php', 'conf_contact'
        // );

        $this->publishes([
            __DIR__ . '/config/conf_contactUs.php' => config_path('conf_contact.php'),
            __DIR__ . '/views/contact' => resource_path('views/vendor/contactus/contact'),
            __DIR__ . '/views/settings' => resource_path('views/vendor/contactus/settings'),
            __DIR__ . '/views/contact.blade.php' => resource_path('views/vendor/contactus/contact.blade.php'),
            __DIR__ . '/vnd_avsr_styles' => public_path('vnd_avsr_styles'),
            __DIR__ . '/vendr_avsr_script' => public_path('vendr_avsr_script')
        ]);
 
    }
}
