<?php
namespace App\PasswordHasher;

use Authentication\PasswordHasher\AbstractPasswordHasher;

class NonePasswordHasher extends AbstractPasswordHasher
{

    public function check($password, string $hashedPassword): bool
    {

        // パスワードが一致シてる場合は true
        return strcmp($password, $hashedPassword) === 0;

    }

    public function hash($password): string
    {

        // 暗号化しない
        return password;

    }

}

