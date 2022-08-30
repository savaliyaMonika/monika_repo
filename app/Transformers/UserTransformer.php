<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * @param \App\User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => (int) $user->id,
            'FullName' => ucfirst($user->name),
            'emailId'=>$user->email,
            'user_Type'=>$user->user_type
        ];
    }
}