<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fees extends Model
{
    use HasFactory;

    protected $table = 'feetable';

    protected $fillable = [
        'member_id',
        'amount',
        'month',
        'due_date'
    ];
}
