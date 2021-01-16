<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    //
    protected $fillable=['name','department','email',
    'vendor_name','vendor_address','vendor_phone'];
}
