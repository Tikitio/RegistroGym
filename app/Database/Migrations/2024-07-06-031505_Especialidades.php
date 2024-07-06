<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Especialidades extends Migration
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
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('Especialidades');
    }

    public function down()
    {
        $this->forge->dropTable('Especialidades');
    }
}
