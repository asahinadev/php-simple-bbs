<?php
declare(strict_types = 1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc.
 * (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link https://cakephp.org CakePHP(tm) Project
 * @since 0.2.9
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Model\Entity\User;
use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Psr\Log\LogLevel;
use Cake\Http\Exception\ForbiddenException;
use Cake\ORM\Table;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 *
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 */
class AppController extends Controller
{


    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {

        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        // 認証
        $this->loadComponent('Authentication.Authentication');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        // $this->loadComponent('FormProtection');
    }

    /**
     * Called before the controller action.
     * You can use this method to configure and customize components
     * or perform logic that needs to happen before each controller action.
     *
     * @param \Cake\Event\EventInterface $event
     *            An Event instance
     * @return \Cake\Http\Response|null|void
     * @link https://book.cakephp.org/4/en/controllers.html#request-life-cycle-callbacks
     */
    public function beforeFilter(EventInterface $event)
    {

        $authUser = false;
        $authUserId = false;

        try {
            $authUser = $this->getIdentity();
            $authUserId = $this->getIdentityData("id");
        }
        catch (\RuntimeException $e) {
            $this->log($e->getMessage(), LogLevel::DEBUG);
        }

        $this->set(compact("authUser", "authUserId"));

    }

    protected function getIdentityData($path)
    {

        return $this->Authentication->getIdentityData($path);

    }

    /**
     *
     * @return User
     */
    protected function getIdentity(): ?User
    {

        return $this->Authentication->getIdentity();

    }

    /**
     * 管理者判定
     *
     * @return boolean
     */
    protected function checkAdmin()
    {

        return boolval($this->getIdentityData("admin"));

    }

    /**
     * 管理者または指定ユーザーか？
     *
     * @param integer|string $id
     * @throws ForbiddenException
     * @return boolean
     */
    protected function checkUserId($id)
    {

        // 管理者に制限はない
        if ($this->checkAdmin()) {
            return true;
        }

        // 対象のユーザーのみ実施可能
        if ($id != $this->getIdentityData("id")) {
            throw new ForbiddenException();
        }

        return true;

    }

    /**
     * \Cake\Http\ServerRequest#allowMethod(array)
     *
     * @param string ...$methods
     */
    protected function allowMethod(...$methods)
    {

        $this->request->allowMethod($methods);

    }

    /**
     * \Cake\Http\ServerRequest#is(array)
     *
     * @param string ...$methods
     * @return boolean
     */
    protected function isMethod(...$methods)
    {

        return $this->request->is($methods);

    }

    /**
     * #redirect
     *
     * @param string $action
     * @param mixed ...$args
     * @return \Cake\Http\Response
     */
    protected function redirectAction($action = "index", ...$args)
    {

        $url = compact("action");

        foreach ($args as $arg) {
            $url[] = $arg;
        }

        return $this->redirect($url);

    }

    protected function getEntity(Table $table, $id, ...$contains)
    {

        return $table->get($id, compact("contains"));

    }

}
