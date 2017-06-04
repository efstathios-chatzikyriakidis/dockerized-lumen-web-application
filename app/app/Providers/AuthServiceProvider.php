<?php

// Change here.

namespace App\Providers;

use App\DataAccess\Repositories\Contracts\IUserRepository;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->viaRequest('api', function ($request) {
            $authorizationKey = 'Authorization';

            if (!$request->header($authorizationKey))
            {
                return null;
            }

            $authorization = $request->header($authorizationKey);

            $whitespaceRegex = '/^\s*$/';

            if (preg_match($whitespaceRegex, $authorization)) {
                return null;
            }

            $parts = explode (' ', $authorization);

            if (count($parts) != 2) {
                return null;
            }

            $type = $parts[0];

            if ($type != "Custom")
            {
                return null;
            }

            $token = $parts[1];

            if (preg_match($whitespaceRegex, $token)) {
                return null;
            }

            $userRepository = $this->app->make(IUserRepository::class);

            $user = $userRepository->getByApiKey($token);

            if ($user) {
                $request->request->add(['userId' => $user->getKey()]);
            }

            return $user;
        });
    }
}

?>