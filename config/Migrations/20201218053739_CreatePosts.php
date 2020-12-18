<?php
declare(strict_types = 1);

use Migrations\AbstractMigration;
use Migrations\Table;
use Phinx\Db\Table\Column;

class CreatePosts extends AbstractMigration
{

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change()
    {

        /**
         *
         * @var Table $table
         */
        $table = $this->table('posts');

        $table->addColumn("text", Column::TEXT, [
            "comment" => "投稿内容"
        ]);
        $table->addColumn("user_id", Column::INTEGER, [
            "comment" => "投稿者"
        ]);
        $table->addForeignKey((array) "user_id", "users");

        $table->create();

    }

}
