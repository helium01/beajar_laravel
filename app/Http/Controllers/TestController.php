<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        if($request==null){
            $jumlahBilangan=0;
            $jumlahKelompok=0;
            $jumlahBaris=0;

        }else{
            $jumlahBilangan=$request->jumlahBilangan;
            $jumlahKelompok=$request->jumlahKelompok;
            $jumlahBaris=$request->jumlahBaris;

        }
        $evenNumbers = $this->generateEvenNumbers((int)$jumlahBilangan, (int)$jumlahKelompok);
        // dd($evenNumbers);
        $pattern = $this->generatePattern((int)$jumlahBaris);

        return view('soal4', compact('evenNumbers', 'pattern','jumlahBilangan','jumlahKelompok','jumlahBaris'));
    }

    function generateEvenNumbers(int $jumlahBilangan, int $jumlahKelompok)
    {
        $result = [];
        $start = 2;
        for ($i = 0; $i < $jumlahKelompok; $i++) {
            $group = [];
            for ($j = 0; $j < $jumlahBilangan / $jumlahKelompok; $j++) {
                $group[] = $start;
                $start += 2;
            }
            $result[] = $group;
        }
        return $result;
    }

    private function generatePattern(int $jumlahBaris)
    {
        $result = [];
        $count = $jumlahBaris * 2 - 1;
        for ($i = $count; $i > 0; $i -= 2) {
            $result[] = str_repeat('*', $i);
        }
        return $result;
    }
}
