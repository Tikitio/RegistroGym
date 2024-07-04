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
            'id_clase' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'fecha_inscripcion' => [
                'type' => 'DATETIME',
            ],
            'pago' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
        ]);
    
        $this->forge->addKey('id', true);
    
        // llaves foráneas
        $this->forge->addForeignKey('id_usuario', 'Usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_clase', 'Clases', 'id', 'CASCADE', 'CASCADE');
    
        $this->forge->createTable('Inscripciones');
    }

    public function down()
    {
        $this->forge->dropTable('Inscripciones');
    }
}
