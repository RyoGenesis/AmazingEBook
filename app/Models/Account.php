<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function role() {
        return $this->belongsTo(Role::class,'role_id','role_id');
    }

    public function gender() {
        return $this->belongsTo(Gender::class,'gender_id','gender_id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'account_id', 'account_id');
    }

    protected $primaryKey = 'account_id';
    public $incrementing = false; 

    protected $guarded=[];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'role_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender_id',
        'email',
        'password',
        'display_picture_link',
        'modified_at',
        'modified_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
