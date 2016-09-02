<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public static function getComments()
    {
        return [
            [
                'img'     => '/upload/users/logo_user.jpg',
                'comment' => "It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting.",
                'user'    => 'Marissa Mayer',
                'company' => 'Yahoo Company',
            ],
            [
                'img'     => '/upload/users/logo_user.jpg',
                'comment' => "It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting.",
                'user'    => 'Marissa Mayer',
                'company' => 'Yahoo Company',
            ],
            [
                'img'     => '/upload/users/logo_user.jpg',
                'comment' => "It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting.",
                'user'    => 'Marissa Mayer',
                'company' => 'Yahoo Company',
            ],
        ];
    }
}
