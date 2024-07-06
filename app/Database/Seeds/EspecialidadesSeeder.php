<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EspecialidadesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombres' => 'Crossfit'
            ],
            [
                'nombres' => 'Yoga'
            ],
            [
                'nombres' => 'TRX'
            ],
            [
                'nombres' => 'Zumba'
            ],
            [
                'nombres' => 'Pilates'
            ],
            [
                'nombres' => 'Spinning'
            ],
        ];
        $this->db->table('Especialidades')->insertBatch($data);
    }
}
