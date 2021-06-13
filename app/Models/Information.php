<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{

    protected $table = 'informations';

    use HasFactory;

    protected $fillable = [
        'first_name',
        'email',
        'father_name',
        'mother_name',
        'address'
    ];


}
