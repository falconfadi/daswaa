<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT','usigned'=>true, 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],

            'client_id' => ['type' => 'INT', 'usigned'=>true],
            'service_id' => ['type' => 'INT', 'usigned'=>true],
            'is_regular' => ['type' => 'TINYINT', 'usigned'=>true],
            'mobile' => ['type' => 'VARCHAR', 'constraint' => 25],
            'landline' => ['type' => 'VARCHAR', 'constraint' => 25],

            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
