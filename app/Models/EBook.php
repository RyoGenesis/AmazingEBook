<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EBook extends Model
{
    use HasFactory;

    public function orders() {
        return $this->hasMany(Order::class, 'ebook_id', 'ebook_id');
    }

    protected $primaryKey = 'ebook_id';
}
