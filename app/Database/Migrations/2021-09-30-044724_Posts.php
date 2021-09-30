<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class Posts extends Migration
{
    public function up()
    {
        #forge->addfield ini utk buat table
        $this->forge->addField([
            'posts_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],

        ]);
        //addkey ini utk jadiin blogid ini PK
        $this->forge->addKey('posts_id', true);
        $this->forge->createTable('posts');
    }

    public function down()
    {
        //ini utk ngapus table/drop tabel baru abis tu create yg terbaru. ini berguna misal utk refresh blognya
        $this->forge->dropTable('posts');
    }
}
