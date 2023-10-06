<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\ProjectCost;
use App\Observers\ProjectObserver;
use App\Listeners\SocialRegistration;
use App\Observers\ProjectCostObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use DutchCodingCompany\FilamentSocialite\Events\Registered as SocialRegistered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SocialRegistered::class => [
            SocialRegistration::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
        ProjectCost::observe(ProjectCostObserver::class);
        Project::observe(ProjectObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
