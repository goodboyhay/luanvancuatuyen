<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    protected $fillable = [
        'token', 'email',
    ];
    public $timestamps = false;
    protected $table="reset_pass";
   
}
