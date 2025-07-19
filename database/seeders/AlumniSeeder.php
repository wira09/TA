<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumni;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data sample alumni
        $alumniData = [
            [
                'nama' => 'Ahmad Rizki',
                'nim' => '2021001',
                'email' => 'ahmad.rizki@example.com',
                'no_hp' => '081234567890',
                'angkatan' => '2021',
                'tahun_lulus' => '2025',
                'program_studi' => 'Teknik Informatika',
                'password' => bcrypt('password'),
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Jakarta Selatan'
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'nim' => '2021002',
                'email' => 'siti.nurhaliza@example.com',
                'no_hp' => '081234567891',
                'angkatan' => '2021',
                'tahun_lulus' => '2025',
                'program_studi' => 'Teknik Informatika',
                'password' => bcrypt('password'),
                'jenis_kelamin' => 'perempuan',
                'alamat' => 'Jakarta Pusat'
            ],
            [
                'nama' => 'Budi Santoso',
                'nim' => '2021003',
                'email' => 'budi.santoso@example.com',
                'no_hp' => '081234567892',
                'angkatan' => '2021',
                'tahun_lulus' => '2025',
                'program_studi' => 'Sistem Informasi',
                'password' => bcrypt('password'),
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Jakarta Barat'
            ],
            [
                'nama' => 'Dewi Sartika',
                'nim' => '2021004',
                'email' => 'dewi.sartika@example.com',
                'no_hp' => '081234567893',
                'angkatan' => '2021',
                'tahun_lulus' => '2025',
                'program_studi' => 'Sistem Informasi',
                'password' => bcrypt('password'),
                'jenis_kelamin' => 'perempuan',
                'alamat' => 'Jakarta Timur'
            ],
            [
                'nama' => 'Rudi Hermawan',
                'nim' => '2021005',
                'email' => 'rudi.hermawan@example.com',
                'no_hp' => '081234567894',
                'angkatan' => '2021',
                'tahun_lulus' => '2025',
                'program_studi' => 'Teknik Informatika',
                'password' => bcrypt('password'),
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Jakarta Utara'
            ],
            [
                'nama' => 'Maya Indah',
                'nim' => '2021006',
                'email' => 'maya.indah@example.com',
                'no_hp' => '081234567895',
                'angkatan' => '2021',
                'tahun_lulus' => '2025',
                'program_studi' => 'Sistem Informasi',
                'password' => bcrypt('password'),
                'jenis_kelamin' => 'perempuan',
                'alamat' => 'Bekasi'
            ]
        ];

        foreach ($alumniData as $data) {
            Alumni::create($data);
        }
    }
}
