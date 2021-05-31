<?php

namespace arrangeMY\VoyagerDeploymentOrchestrator\Providers;

use TCG\Voyager\Events\BreadChanged;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use arrangeMY\VoyagerDeploymentOrchestrator\Listeners\VoyagerBreadChanged;

class OrchestratorEventServiceProvider extends EventServiceProvider
{
    /** @var array $listen */
    protected $listen = [
        BreadChanged::class => [
            VoyagerBreadChanged::class,
        ],
    ];
}
