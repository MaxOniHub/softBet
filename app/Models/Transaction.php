<?php

namespace App\Models;

use App\Interfaces\IEntity;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model implements IEntity
{

    protected $fillable = [
        'user_id',
        'date',
        'amount',
        'currency'
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }
}
