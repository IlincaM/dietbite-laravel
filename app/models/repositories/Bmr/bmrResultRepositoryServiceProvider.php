<?php

namespace Repositories\Bmr;
use Repositories\Bmr\BmrResultRepository;
use Illuminate\Support\ServiceProvider;
use Entities\BmrResult;

/**
 * Description of bmrResultRepositoryServiceProvider
 *
 * @author ilinca
 */
class bmrResultRepositoryServiceProvider  extends ServiceProvider{

    /**
    * Registers the bmrInterface with Laravels IoC Container
    * 
    */
    public function register()
    {
        // Bind the returned class to the namespace 'Repositories\bmrInterface
        $this->app->bind('Repositories\Bmr\bmrInterface', function($app)
        {
            return new BmrResultRepository(new BmrResult());
        });
    }
}
