<?php
/* MODEL ANNOTATION:
@property bigint(20) unsigned $id Type: bigint(20) unsigned, Extra: auto_increment, Default: null, Key: PRI
@property string $name Type: varchar(255), Extra: , Default: null, Key: nil
@property string $username Type: varchar(255), Extra: , Default: null, Key: UNI
@property string $email Type: varchar(255), Extra: , Default: null, Key: UNI
@property int|null $email_verified_at Type: timestamp, Extra: , Default: null, Key: nil
@property string $password Type: varchar(255), Extra: , Default: null, Key: nil
@property string|null $remember_token Type: varchar(100), Extra: , Default: null, Key: nil
@property tinyint(1) $admin Type: tinyint(1), Extra: , Default: 0, Key: nil
@property int|null $created_at Type: timestamp, Extra: , Default: null, Key: nil
@property int|null $updated_at Type: timestamp, Extra: , Default: null, Key: nil

END MODEL ANNOTATION */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student() {
        return $this->hasOne('App\Model\Student');
    }
}
