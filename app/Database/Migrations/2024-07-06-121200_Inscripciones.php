<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inscripciones extends Migration
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
        'id_usuario' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
        ],
        'id_especialidad' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
        ],
        'id_clase' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
        ],
       
    ]);

    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('id_usuario', 'usuarios', 'id', 'CASCADE', 'CASCADE');
    $this->forge->addForeignKey('id_especialidad', 'especialidades', 'id', 'CASCADE', 'CASCADE');
    $this->forge->addForeignKey('id_clase', 'clases', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('Inscripciones');
}

    public function down()
    {
        $this->forge->dropTable('Inscripciones');
    }
}