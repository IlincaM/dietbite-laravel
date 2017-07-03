<?php

namespace Repositories\Bmr;
use Repositories\Bmr\BmrResultRepository;
use Illuminate\Support\ServiceProvider;
use Entities\BmrResult;

/**
 * Description of bmrResultRepositoryServiceProvider
 *
 *@author Moncea Ilinca <john.doe@example.com>
 */
class BmrResultRepositoryServiceProvider  extends ServiceProvider{

    /**
    * Registers the BmrInterface with Laravels IoC Container
    * 
    */
    public function register()
    {
        // Bind the returned class to the namespace 'Repositories\BmrInterface
        $this->app->bind('Repositories\Bmr\BmrInterface', function($app)
        {
            return new BmrResultRepository(new BmrResult());
        });
    }
}
