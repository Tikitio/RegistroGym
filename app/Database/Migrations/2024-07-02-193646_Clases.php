<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clases extends Migration
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
        'descripcion' => [
            'type' => 'TEXT',
            'null' => true, // Puedes cambiar esto a 'false' si el campo no debe ser nulo
        ],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('id_instructor', 'instructores', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('Clases');
}

    public function down()
    {
        $this->forge->dropTable('Clases');
    }
}
