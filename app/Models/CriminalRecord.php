<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalRecord extends Model
{
    use HasFactory;
    protected $table = 'criminal_records';

    protected $fillable = [
        'criminal_name',
        'criminal_address',
        'criminal_dob',
        'criminal_mobile',
        'criminal_nic',
        'father_name',
        'father_nic',
    ];
}
