<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddPembeliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat objek user
        $pembeli = new \App\Models\Pembeli;
        $pembeli->nama="sarah";
        $pembeli->jenis_kelamin="perempuan";
        $pembeli->email="sarahadibah06@gmail.com";
        $pembeli->alamat="jl cipinang";
        $pembeli->kode_pos="13410";
        $pembeli->kota="jakarta";
        $pembeli->password = Hash::make('1234567');
        $pembeli->save();
        $this->command->info("Pembeli telah dibuat");

        $pembeli = new \App\Models\Pembeli;
        $pembeli->nama="kento";
        $pembeli->jenis_kelamin="laki=laki";
        $pembeli->email="kento@gmail.com";
        $pembeli->alamat="jl nishi";
        $pembeli->kode_pos="86044";
        $pembeli->kota="kumamoto";
        $pembeli->password = Hash::make('1234567');
        $pembeli->save();
        $this->command->info("Pembeli telah dibuat");
    }
}
