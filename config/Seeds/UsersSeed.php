<?php
declare(strict_types = 1);

use Migrations\AbstractSeed;
use App\Model\Entity\User;
use Migrations\Table;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {

        $out = $this->getOutput();

        $datas = [
            [
                'username' => 'system3@example.co.jp',
                'email' => 'system3@example.co.jp',
                'password' => 'password2',
                'created' => date("Y/m/d H:m:s"),
                'modified' => date("Y/m/d H:i:s"),
                'enable' => true,
                'admin' => true,
            ],
            [
                'username' => 'user@example.co.jp',
                'email' => 'user@example.co.jp',
                'password' => 'password2',
                'created' => date("Y/m/d H:m:s"),
                'modified' => date("Y/m/d H:i:s"),
                'enable' => true,
                'admin' => false,
            ],
            [
                'username' => 'disable@example.co.jp',
                'email' => 'disable@example.co.jp',
                'password' => 'password2',
                'created' => date("Y/m/d H:m:s"),
                'modified' => date("Y/m/d H:i:s"),
                'enable' => false,
                'admin' => false,
            ],
        ];

        /**
         *
         * @var Table $table
         */
        $table = $this->table('users');
        foreach ($datas as $data) {
            try {
                $out->writeln(sprintf("insert %s", json_encode($data)));
                $table->insert($data);
                $table->save();
            }
            catch (PDOException $e) {
                $out->writeln($e->getMessage());
            }
        }

    }

}
