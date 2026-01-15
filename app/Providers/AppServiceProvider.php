<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        // Livewire lifecycle hook to show a generic error toast for unhandled exceptions
        \Livewire\Livewire::listen('exception', function ($component, $e, $stopPropagation) {
            if (config('app.debug') || config('app.env') === 'local') {
                return;
            }

            if (!$e instanceof \Illuminate\Validation\ValidationException) {
                report($e);

                $component->dispatch(
                    'notify',
                    content: 'An unexpected error occurred.',
                    type: 'error',
                );

                $stopPropagation();
            }
        });
    }
}
