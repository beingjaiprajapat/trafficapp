<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignalSequence extends Model
{
    use HasFactory;

    protected $fillable = [
        'sequence',
        'green_interval',
        'yellow_interval'
    ];
}
