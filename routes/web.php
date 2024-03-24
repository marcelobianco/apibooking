<?php

use App\Mail\TesteMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Mail::to('marcelognn@gmail.com')->send(new TesteMail());
    return view('welcome');
});
