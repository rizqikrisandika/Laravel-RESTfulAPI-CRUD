<?php

use Carbon\Traits\Timestamp;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert(array(
            array(
                'nama_barang' => 'Cimory',
                'jumlah_barang' => '10',
            ),
            array(
                'nama_barang' => 'Teh Kotak',
                'jumlah_barang' => '9',
            ),
            array(
                'nama_barang' => 'Sprite',
                'jumlah_barang' => '7',
            ),
            array(
                'nama_barang' => 'Bintang',
                'jumlah_barang' => '50',
            ),
            array(
                'nama_barang' => 'Teh Pucuk',
                'jumlah_barang' => '15',
            )           
        ));
    }
}
