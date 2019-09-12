<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPmz extends Model
{
    protected $fillable = ['nome','registro'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
