<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class ApiController extends Controller
{
    public function getPegawai(Request $request) {
        if($request->_token) {
            $getPegawai = Pegawai::findOrFail($request->id_pegawai);

            return response()->json(['error' => false, 'data' => $getPegawai, 'message' => 'Data Ditemukan!!'], 200);
        } else {
            return response()->json(['error' => true, 'message'=>'Api Tidak Valid!!'], 401);
        }
    }
}
