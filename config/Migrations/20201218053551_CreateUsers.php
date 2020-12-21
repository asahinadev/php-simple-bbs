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
        $table->addColumn("email", "string", [
            "length" => 255,
            "comment" => "メールアドレス"
        ]);
        $table->addColumn("password", "string", [
            "length" => 50,
            "comment" => "パスワード"
        ]);
        $table->addColumn('enable', 'boolean', [
            'default' => false,
            'null' => false,
            "comment" => "有効判定"
        ]);
        $table->addColumn('admin', 'boolean', [
            'default' => false,
            'null' => false,
            "comment" => "管理者"
        ]);
        $table->addColumn('code', "string", [
            'default' => false,
            'null' => false,
            "comment" => "認証用コード"
        ]);
        $table->addTimestamps("created", "modified");

        $table->create();

    }

}
