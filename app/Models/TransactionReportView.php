<?php

namespace App\Models;

use App\Interfaces\IEntity;
use Illuminate\Database\Eloquent\Model;

class TransactionReportView extends Model implements IEntity
{
    protected $fillable = [
        'transactions',
        'total',
        'date',
        'currency'
    ];

    protected $table = "transactions_report";
}
