<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function account() {
        return $this->belongsTo(Account::class,'account_id','account_id');
    }

    public function ebook() {
        return $this->belongsTo(EBook::class,'ebook_id','ebook_id');
    }

    protected $primaryKey = 'order_id';
}
