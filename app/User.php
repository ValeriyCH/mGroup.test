<?php
namespace App;

use App\Models\BaseModels\BaseModel;
use Collective\Html\HtmlBuilder;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, BaseModel;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'username' => 'required',
        'email' => 'required|unique:users|email',
        'password' => 'min:6|required',
//        'password_confirmation' => 'min:6|same:pass'
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Roles', 'role_id', 'id');
    }

    function attributesLabels()
    {
        //TODO: translate
        return $attributes = [
            'name' => 'Your name',
            'company_name' => 'Company name',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation',
            'accept_nda' => 'I accept the incubation '. '<a href="'.route('static.nda').'">NDA</a>',
            'like_to_speak' => 'Would you like to speak to us now?',
        ];
    }
}