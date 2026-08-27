<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function greeting()
    {
        return view('greeting');
    }

    public function penjumlahan()
    {
        $hasil = 0;
        return view('penjumlahan', compact('hasil'));
    }

    public function pengurangan()
    {
        $hasilkurang = 0;
        return view('pengurangan', compact('hasilkurang'));
    }

    public function pembagian()
    {
        $hasilbagi = 0;
        return view('pembagian', compact('hasilbagi'));
    }

    public function perkalian()
    {
        $hasilkali = 0;
        return view('perkalian', compact('hasilkali'));
    }

    public function actionPenjumlahan(Request $request)
    {
        $angka1 = $request->input('angka1');
        $angka2 = $request->input('angka2');
        $hasil = $angka1 + $angka2;

        return view ('penjumlahan', compact('hasil'));
    }

    public function actionPengurangan(Request $request)
    {
        $angka1 = $request->input('angka1');
        $angka2 = $request->input('angka2');
        $hasilkurang = $angka1 - $angka2;

        return view('pengurangan', compact('hasilkurang'));
    }

    public function actionPembagian(Request $request)
    {
        $angka1 = $request->input('angka1');
        $angka2 = $request->input('angka2');
        $hasilbagi = $angka1 / $angka2;

        return view('pembagian', compact('hasilbagi'));
    }

    public function actionPerkalian(Request $request)
    {
        $angka1 = $request->input('angka1');
        $angka2 = $request->input('angka2');
        $hasilkali = $angka1 * $angka2;

        return view('perkalian', compact('hasilkali'));
    }
}
