<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\Interfaces\BaseRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Base
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);

        // Autor
        $this->app->bind(\Modules\Autor\Repositories\Interfaces\AutorRepositoryInterface::class, \Modules\Autor\Repositories\AutorRepository::class);
        $this->app->bind(\Modules\Autor\Services\Interfaces\AutorServiceInterface::class, \Modules\Autor\Services\AutorService::class);

        // Assunto
        $this->app->bind(\Modules\Assunto\Repositories\Interfaces\AssuntoRepositoryInterface::class, \Modules\Assunto\Repositories\AssuntoRepository::class);
        $this->app->bind(\Modules\Assunto\Services\Interfaces\AssuntoServiceInterface::class, \Modules\Assunto\Services\AssuntoService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
