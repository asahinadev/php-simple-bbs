<?php
declare(strict_types = 1);

use Migrations\AbstractMigration;
use Migrations\Table;
use Phinx\Db\Table\Column;

class CreateUsers extends AbstractMigration
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
        $table = $this->table('users');

        $table->addColumn("username", Column::STRING, [
            "length" => 50,
            "comment" => "アカウント"
        ]);
        $table->addColumn("email", Column::STRING, [
            "length" => 255,
            "comment" => "メールアドレス"
        ]);
        $table->addColumn("password", Column::STRING, [
            "length" => 50,
            "comment" => "パスワード"
        ]);
        $table->addTimestamps("created", "modified");

        $table->create();

    }

}
