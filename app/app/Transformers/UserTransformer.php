<?php

namespace App\Transformers;

use App\DataAccess\Models\User;

use App\Transformers\Contracts\IUserTransformer;

use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract implements IUserTransformer
{
    public function transform(User $model)
    {
        return [
            'id' => $model->id,

            'firstName'  => $model->first_name,

            'lastName'  => $model->last_name,

            'email' => $model->email
        ];
    }
}

?>