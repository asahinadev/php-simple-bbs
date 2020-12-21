<?php
declare(strict_types = 1);

use Migrations\AbstractSeed;
use App\Model\Entity\User;

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

        $data = [
            'username' => 'system3@example.co.jp',
            'email' => 'system3@example.co.jp',
            'password' => 'password2',
            'created' => date("Y/m/d H:m:s"),
            'modified' => date("Y/m/d H:i:s"),
            'enable' => true,
            'admin' => true,
        ];

        $table = $this->table('users');
        try {
            $table->insert($data)
                ->save();
        }
        catch (PDOException $e) {
            $this->getOutput()
                ->writeln($e->getMessage());
        }

    }

}
