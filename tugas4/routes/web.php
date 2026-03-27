<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    $logs = DB::table("log_keuangan")->get();

    return view("welcome", [
        "logs" => $logs,
    ]);
});

Route::get("/tambah", function () {
    return view("tambah");
});
