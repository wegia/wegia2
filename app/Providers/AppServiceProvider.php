<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

        $this->app->bind(
            'App\Repositories\Contracts\CargoRepositoryInterface',
            'App\Repositories\Eloquent\CargoRepository');
        
        $this->app->bind(
            'App\Repositories\Contracts\EscalaRepositoryInterface',
            'App\Repositories\Eloquent\EscalaRepository');

        $this->app->bind(
            'App\Repositories\Contracts\ColaboradorRepositoryInterface',
            'App\Repositories\Eloquent\ColaboradorRepository');

        $this->app->bind(
            'App\Repositories\Contracts\ContatoRepositoryInterface',
            'App\Repositories\Eloquent\ContatoRepository');
    
        $this->app->bind(
            'App\Repositories\Contracts\FuncionarioRepositoryInterface',
            'App\Repositories\Eloquent\FuncionarioRepository');
            
        // Ao carregar um service provider, instanciar todas as interfaces de PessoaRepository 
        // com a classe que está utilizando o eloquent de base
        $this->app->bind(
            'App\Repositories\Contracts\PessoaRepositoryInterface',
            'App\Repositories\Eloquent\PessoaRepository');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Factory::guessFactoryNamesUsing(function(string $modelName) {
            return 'Database\\Factories\\' . class_basename($modelName) . 'Factory';
          });
      
    }
}
