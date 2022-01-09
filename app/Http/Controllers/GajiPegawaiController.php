<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\GajiPegawai;
use App\Models\Pegawai;

class GajiPegawaiController extends Controller
{
    public function index(){
        $gaji = GajiPegawai::with('pegawai')->orderBy('id', 'DESC')->paginate(5);
        return view('gaji_pegawai.index', compact('gaji', $gaji));
    }

    public function create(){
        $GajiPegawai = GajiPegawai::all();
        $array_id = [];
        
        for($i = 0; $i < count($GajiPegawai); $i++) {
            array_push($array_id, $GajiPegawai[$i]->id_pegawai);
        }

        $pegawai = Pegawai::whereNotIn('id', $array_id)->get();
        return view('gaji_pegawai.create', compact('pegawai', $pegawai));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'unique:gaji_pegawai',
        ]);

        if($validator->fails()) {
            return redirect()->back()->with(['failed' => "pegawai sudah ada di bulan ini"]);
        }

        $data = [
            'waktu' => date('Y-m-d h:i:s'),
            'id_pegawai' => $request->id_pegawai,
            'total_diterima' => $request->total_diterima,
        ];

        $create = GajiPegawai::create($data);
        if($create) {
            return redirect()->route('gaji_pegawai.index')->with(['message' => 'Gaji Pegawai Telah Berhasil!!']);
        }
    }

    public function create_batch(){
        $GajiPegawai = GajiPegawai::all();
        $array_id = [];

        for($i = 0; $i < count($GajiPegawai); $i++) {
            array_push($array_id, $GajiPegawai[$i]->id_pegawai);
        }

        $pegawai = Pegawai::whereNotIn('id', $array_id)->get();
        return view('gaji_pegawai.create_batch', compact('pegawai', $pegawai));
    }

    public function store_batch(Request $request){
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'required|array',
            'id_pegawai.*' => 'required|distinct',
            'total_diterima' => 'required|array',
            'total_diterima.*' => 'required|distinct',
        ]);

        if($validator->fails()) {
            return redirect()->back()->with(['failed' => 'Ada Kesalah Dalam Pengisian']);
        }

        for($i = 0; $i < count($request->id_pegawai); $i++) {
            $data = [
                'waktu' => date('Y-m-d h:i:s'),
                'id_pegawai' => $request->id_pegawai[$i],
                'total_diterima' => $request->total_diterima[$i],
            ];

            GajiPegawai::create($data);
        }

        return redirect()->route('gaji_pegawai.index')->with(['message' => 'Penggajian Telah Berhasil!!!']);
    }
}
