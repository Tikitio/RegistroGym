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
                'constraint' => 50,
            ],
            'apellidos' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'sexo' => [
                'type' => 'TINYINT',
                'constraint' => 5,
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'id_especialidad' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_especialidad', 'especialidades', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Instructores');
    }

    public function down()
    {
        $this->forge->dropTable('Instructores');
    }
}
