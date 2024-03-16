<?php

use Illuminate\Support\Facades\Route;

Route::get('/administrator/journal', function () {
    return view('admin.page.journal');
});

Route::get('rfid', function () {
    return view('admin.page.user.rfid');
});

