<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================
        // ADMIN
        // ==========================
        User::create([
            'name' => 'Admin e-ASKEB',
            'email' => 'admin@askeb.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        // ==========================
        // DOSEN
        // ==========================
        User::create([
            'name' => 'Devi Endah Saraswati, S.ST., M.Kes',
            'email' => 'devi@askeb.com',
            'password' => Hash::make('password123'),
            'role' => 'dosen'
        ]);

        User::create([
            'name' => 'Fela Putri Hariastuti, S.ST., M.Kes',
            'email' => 'fela@askeb.com',
            'password' => Hash::make('password123'),
            'role' => 'dosen'
        ]);

        User::create([
            'name' => 'Andin Ajeng Rahmawati, S.ST., M.Kes',
            'email' => 'andin@askeb.com',
            'password' => Hash::make('password123'),
            'role' => 'dosen'
        ]);

        // ==========================
        // MAHASISWA
        // ==========================
        User::create([
            'name' => 'Mahasiswa 1',
            'email' => 'mhs1@askeb.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa'
        ]);

        User::create([
            'name' => 'Mahasiswa 2',
            'email' => 'mhs2@askeb.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa'
        ]);
    }
}