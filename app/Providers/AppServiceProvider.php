<?php

namespace App\Providers;

use App\Models\User\User;
use App\Models\User\Post;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-user-posts', function (User $user, $userId) {
            return $user->id == $userId;
        });
        Gate::define('edit-user-posts', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
    }
}
