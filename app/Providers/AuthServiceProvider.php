<?php

namespace App\Providers;

use App\Models\MasterBrand;
use App\Models\MasterCategory;
use App\Models\MasterItem;
use App\Policies\BrandPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ItemPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        MasterBrand::class => BrandPolicy::class,
        MasterCategory::class => CategoryPolicy::class,
        MasterItem::class => ItemPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}