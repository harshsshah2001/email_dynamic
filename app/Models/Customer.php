<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // use HasFactory;

    protected $fillable = ['from_mail', 'to_mail', 'add_comment'];

}
