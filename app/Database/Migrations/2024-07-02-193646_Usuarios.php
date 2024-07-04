<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
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
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => 60,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('Usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('Usuarios');
    }
}
