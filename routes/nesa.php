<?php

use Illuminate\Support\Facades\Route;

Route::get('journal', function () {
    return view('admin.page.journal');
});
