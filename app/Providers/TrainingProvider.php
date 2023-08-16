<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//REPOS USE
       
use App\Repositories\RecordRepositoryInterface;
use App\Repositories\RecordRepository;
use App\Repositories\BookRepositoryInterface;
use App\Repositories\BookRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
      
use App\Repositories\AuthorRepositoryInterface;
use App\Repositories\AuthorRepository;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\SliderRepository;
class TrainingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            BookRepositoryInterface::class,
            BookRepository::class
        );
        $this->app->bind(
            RecordRepositoryInterface::class,
            RecordRepository::class
        );
        $this->app->bind(
            AuthorRepositoryInterface::class,
            AuthorRepository::class
        );
        
        $this->app->bind(
            SliderRepositoryInterface::class,
            SliderRepository::class
        );

        //REPOS BIND END
    }
}
