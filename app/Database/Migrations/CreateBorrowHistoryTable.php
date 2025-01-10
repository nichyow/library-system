<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBorrowHistoryTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'SERIAL',
                'auto_increment' => true
            ],
            'borrower_id' => [
                'type' => 'INT',
            ],
            'book_id' => [
                'type' => 'INT',
            ],
            'borrow_date' => [
                'type' => 'DATE',
            ],
            'return_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('borrow_history');
    }

    public function down()
    {
        $this->forge->dropTable('borrow_history');
    }
}
