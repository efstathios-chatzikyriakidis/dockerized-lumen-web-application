<?php

// Change here.

namespace App\Providers;

use App\Validation\Contracts\IAuthenticationLoginRequestValidation;
use App\Validation\Contracts\ISensorCreateRequestValidation;
use App\Validation\Contracts\ISensorUpdateRequestValidation;
use App\Validation\Contracts\IUserCreateRequestValidation;

use App\Validation\AuthenticationLoginRequestValidation;
use App\Validation\SensorCreateRequestValidation;
use App\Validation\SensorUpdateRequestValidation;
use App\Validation\UserCreateRequestValidation;

use App\DataAccess\Repositories\Contracts\ISensorTypeRepository;
use App\DataAccess\Repositories\Contracts\ISensorRepository;
use App\DataAccess\Repositories\Contracts\IUserRepository;

use App\DataAccess\Repositories\SensorTypeRepository;
use App\DataAccess\Repositories\SensorRepository;
use App\DataAccess\Repositories\UserRepository;

use App\Services\Contracts\IAuthenticationService;
use App\Services\Contracts\ISensorTypeService;
use App\Services\Contracts\ISensorService;
use App\Services\Contracts\IUserService;

use App\Services\AuthenticationService;
use App\Services\SensorTypeService;
use App\Services\SensorService;
use App\Services\UserService;

use App\Transformers\Infrastructure\ITransformerService;
use App\Transformers\Infrastructure\FractalTransformerService;

use App\Transformers\Contracts\ISensorTypeTransformer;
use App\Transformers\Contracts\ISensorTransformer;
use App\Transformers\Contracts\IUserTransformer;

use App\Transformers\SensorTypeTransformer;
use App\Transformers\SensorTransformer;
use App\Transformers\UserTransformer;

use League\Fractal\Serializer\ArraySerializer;
use Illuminate\Support\ServiceProvider;
use League\Fractal\Manager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ISensorTypeRepository::class, SensorTypeRepository::class);

        $this->app->bind(IUserRepository::class, UserRepository::class);

        $this->app->bind(ISensorRepository::class, SensorRepository::class);

        $this->app->bind(ISensorTypeService::class, SensorTypeService::class);

        $this->app->bind(ISensorService::class, SensorService::class);

        $this->app->bind(IUserService::class, UserService::class);

        $this->app->bind(IAuthenticationService::class, AuthenticationService::class);

        $this->app->bind(IUserCreateRequestValidation::class, UserCreateRequestValidation::class);

        $this->app->bind(ISensorCreateRequestValidation::class, SensorCreateRequestValidation::class);

        $this->app->bind(ISensorUpdateRequestValidation::class, SensorUpdateRequestValidation::class);

        $this->app->bind(IAuthenticationLoginRequestValidation::class, AuthenticationLoginRequestValidation::class);

        $this->app->bind(ITransformerService::class, FractalTransformerService::class);

        $this->app->bind(ISensorTypeTransformer::class, SensorTypeTransformer::class);

        $this->app->bind(IUserTransformer::class, UserTransformer::class);

        $this->app->bind(ISensorTransformer::class, SensorTransformer::class);

        $this->app->bind(Manager::class, function () {
            $manager = new Manager();

            $manager->setSerializer(new ArraySerializer());

            return $manager;
        });
    }
}

?>