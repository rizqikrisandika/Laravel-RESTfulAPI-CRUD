<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BarangModel;

class ApiController extends Controller
{
    public function get_all_barang()
    {
        $barang =  BarangModel::all();

        return response()->json($barang,200);
    }

    public function insert_data_barang(Request $request)
    {
        $insert_barang = new BarangModel;
        $insert_barang->nama_barang = $request->namaBarang;
        $insert_barang->jumlah_barang = $request->jmlBarang;
        $insert_barang->save();

        return response([
            'status' => 'OK',
            'message' => 'Barang Disimpan',
            'data' => $insert_barang
        ],200);
    }

    public function update_data_barang(Request $request, $id)
    {
        $check = BarangModel::Where('kode_barang',$id);

        if($check)
        {
            $data_barang = BarangModel::find($id);
            $data_barang->nama_barang = $request->namaBarang;
            $data_barang->jumlah_barang = $request->jmlBarang;
            $data_barang->save();

            return response([
                'status' => 'OK',
                'message' => 'Data Berhasil Diubah',
                'update-data' => $data_barang
            ],200);
        }else{
            return response([
                'status' => 'Not Found',
                'message' => 'Kode Barang Tidak Ditemukan'
            ],404);
        }

        
    }

    public function delete_data_barang($id)
    {
        $check = BarangModel::firstWhere('kode_barang',$id);
        if($check)
        {
            BarangModel::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Data Dihapus',
            ],200);
        }else{
            return response([
                'status' => 'Not Found',
                'message' => 'Kode Barang Tidak Ditemukan'
            ],404);
        }
    }
}
