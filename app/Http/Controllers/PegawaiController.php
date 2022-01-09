<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pegawai;


class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::paginate(5);
        return view('pegawai.index', compact('pegawai', $pegawai));
    }

    public function create() {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pegawai' => 'required|unique:pegawai|max:10',
            'total_gaji' => 'required|numeric',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if($request->total_gaji < '4000000' || $request->total_gaji > '10000000') {
            return redirect()->back()->with(['failed' => 'Gaji yang ditetapkan tidak masuk min dan max']);
        }

        $data = [
            'nama_pegawai' => $request->nama_pegawai,
            'total_gaji' => $request->total_gaji,
        ];

        $create = Pegawai::create($data);

        if($create) {
            return redirect()->route('pegawai.index')->with(['success' => 'User Berhasil Dibuat!!']);
        }
    }
}
