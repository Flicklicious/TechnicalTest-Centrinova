<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
    public function up()
    {
        //
        $this->forge->addField
        ([
            'PostId'=>[
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'Username' =>[
                'type'=> 'VARCHAR',
                'constraint' => 25
            ],
            'PostTitle' =>[
                'type' => 'VARCHAR',
                'constraint' => 256
            ],
            'PostTitleSEO' =>[
                'type' => 'VARCHAR',
                'constraint' => 256
            ],
            'PostStatus' =>[
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default' => 'active'
            ],
            'PostType' =>[
                'type' => 'ENUM',
                'constraint' => ['article','page'],
                'default' => 'article'
            ],
            'PostThumbnail' =>[
                'type' => 'VARCHAR',
                'constraint' => 256
            ],
            'PostDescription' =>[
                'type' => 'VARCHAR',
                'constraint' => 256
            ],
            'PostContent' =>[
                'type' => 'LONGTEXT'
            ],
            'PostTime timestamp default now()'
        ]);

        $this->forge->addKey('PostId', TRUE);
        $this->forge->createTable('posts');
    }

    public function down()
    {
        //
        $this->forge->dropTable('posts');
    }
}
