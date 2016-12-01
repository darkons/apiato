<?php

namespace App\Containers\Paypal\Providers;

use Anouar\Paypalpayment\Facades\PaypalPayment;
use Anouar\Paypalpayment\PaypalpaymentServiceProvider as PaypalServiceProvider;
use App\Port\Provider\Abstracts\ServiceProviderAbstract;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class MainServiceProvider extends ServiceProviderAbstract
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Container Service Providers.
     *
     * @var array
     */
    public $containerServiceProviders = [
        PaypalServiceProvider::class,
    ];

    /**
     * Container Aliases
     *
     * @var  array
     */
    public $containerAliases = [
        'Paypalpayment' => PaypalPayment::class,
    ];

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->loadContainersInternalProviders();
    }

    /**
     * Register anything in the container.
     */
    public function register()
    {
        $this->loadContainersInternalAliases();
    }
}
