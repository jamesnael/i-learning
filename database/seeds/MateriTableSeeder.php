<?php

use App\Models\Materi;
use Illuminate\Database\Seeder;

class MateriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materi::create([
            'teacher_id' => '1',
            'judul_materi' => 'Majas',
            'materi_url' => 'majas',
            'materi_mapel' => 'B.Indonesia',
            'materi_kelas' => 'X',
            'isi_materi' => '<p>Kerjakan</p>',
            'thumbnail_image' => 'bindo.png',
            'view_count' => '0',   
        ]);
        Materi::create([
            'teacher_id' => '1',
            'judul_materi' => 'Passive Voice',
            'materi_url' => 'passive-vocie',
            'materi_mapel' => 'B.Inggris',
            'materi_kelas' => 'XI',
            'isi_materi' => '<p>Kerjakan</p>',
            'thumbnail_image' => 'inggris.png',
            'view_count' => '0',     
        ]);
        Materi::create([
            'teacher_id' => '1',
            'judul_materi' => 'Invers',
            'materi_url' => 'invers',
            'materi_mapel' => 'Matematika',
            'materi_kelas' => 'XI',
            'isi_materi' => '<p>Selesaikan</p>',
            'thumbnail_image' => 'mtk.png',  
            'view_count' => '0',
        ]);
        Materi::create([
            'teacher_id' => '1',
            'judul_materi' => 'Android',
            'materi_url' => 'android',
            'materi_mapel' => 'Produktif',
            'materi_kelas' => 'XII',
            'isi_materi' => '<p>Kerjakannn</p>',
            'thumbnail_image' => 'prod.png', 
            'view_count' => '0',  
        ]);
    }
}
