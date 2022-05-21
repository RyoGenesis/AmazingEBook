<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    public function accounts() {
        return $this->hasMany(Account::class, 'gender_id', 'gender_id');
    }

    protected $primaryKey = 'gender_id';
}
