<?php
declare(strict_types = 1);
namespace App\Controller\Component;

use App\Model\Entity\User;
use Cake\Controller\Component;
use Cake\Mailer\Mailer;

/**
 * UserMailer component
 */
class UserMailerComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function registMail(User $user)
    {

        $mailer = new Mailer('default');

        $mailer->setEmailFormat("html")
            ->setSubject(sprintf("[%s] %s",
                __("APP NAME"),
                __("User registration is complete.")))
            ->addTo($user->email, $user->username)
            ->setViewVars("user", $user);

        $mailer->viewBuilder()
            ->setLayout("users")
            ->setTemplate("users/regist");

        $mailer->deliver();

    }

}
