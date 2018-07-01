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

    protected $hidden = [
        'is_deleted'
    ];

    public function setIsDeletedAttribute($is_deleted)
    {
        $this->attributes['is_deleted'] = $is_deleted;
    }

    public function getIsDeletedAttribute()
    {
        return $this->is_deleted;
    }

    public function scopeActive($query)
    {
        $query->where('is_deleted', 0);
    }

    public function scopeDeleted($query)
    {
        $query->where('is_deleted', 1);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
