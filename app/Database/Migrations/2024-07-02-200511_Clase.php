<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clase extends Migration
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
            'grupo' => [
                'type' => 'VARCHAR',
                'constraint' => 60,
            ],
            'horario' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'id_instructor' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'fecha_inicio' => [
                'type' => 'DATETIME',
            ],
            'fecha_fin' => [
                'type' => 'DATETIME',
            ],
        ]);
    
        $this->forge->addKey('id', true);
    
        // llave foránea
        $this->forge->addForeignKey('id_instructor', 'instructores', 'id', 'CASCADE', 'CASCADE');
    
        $this->forge->createTable('Clases');
    }

    public function down()
    {
        $this->forge->dropTable('Clases');
    }
}
