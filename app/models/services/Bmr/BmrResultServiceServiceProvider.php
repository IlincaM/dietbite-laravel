<?php

namespace Services\Bmr;

use Illuminate\Support\ServiceProvider;
use Repositories\Bmr\BmrInterface;

/**
 * Description of BmrResultServiceServiceProvider
 *
 * @author Ilinca
 */
class BmrResultServiceServiceProvider extends ServiceProvider {
    
/**
    * Registers the service in the IoC Container
    * 
    */
    public function register()
    {
        // Binds 'BmrService' to the result of the closure
        $this->app->bind('BmrService', function($app)
        {
            return new BmrService(
                // Inject in our class of bmrInterface, this will be our repository
                $app->make('Repositories\Bmr\BmrInterface')
            );
        });
    }
}
