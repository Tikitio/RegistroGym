<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Instructores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombres' => [
                'type' => 'VARCHAR',
                'constraint' => 60,
            ],
            'ap_paterno' => [
                'type' => 'VARCHAR',
                'constraint' => 60,
            ],
            'ap_materno' => [
                'type' => 'VARCHAR',
                'constraint' => 60,
            ],
            'sexo' => [
                'type' => 'CHAR',
                'NULL' => true,
            ],
            'edad' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'especialidad' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('Instructores');
    }

    public function down()
    {
        $this->forge->dropTable('Instructores');
    }
}
