<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $fillable = [
        'token', 'email',
    ];
    public $timestamps = false;
    protected $table="reset_pass";

}
