<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormInput extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id','name','type','sort_order_number','required'
    ];
}
