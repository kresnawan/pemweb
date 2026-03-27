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

Route::post("/tambah", function () {
    $tipe = request("tipe");
    $nominal = request("nominal");

    if (!isset($tipe) || !isset($nominal)) {
        return redirect()->back()->with("result", "Data tidak boleh kosong!");
    }

    $res = DB::table("log_keuangan")->insert([
        "tipe" => $tipe,
        "nominal" => $nominal,
    ]);
    if ($res == true) {
        return redirect("/");
    } else {
        return "Error";
    }
});
