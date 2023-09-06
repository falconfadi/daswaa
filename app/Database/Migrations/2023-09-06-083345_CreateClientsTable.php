<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT','usigned'=>true, 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],


            'is_regular' => ['type' => 'TINYINT', 'usigned'=>true],
            'first_name' => ['type' => 'VARCHAR', 'constraint' => 25],
            'last_name' => ['type' => 'VARCHAR', 'constraint' => 25],
            'father_name' => ['type' => 'VARCHAR', 'constraint' => 25],
            'national_id' => ['type' => 'VARCHAR', 'constraint' => 11],

            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('clients');
    }

    public function down()
    {
        $this->forge->dropTable('clients');
    }
}
