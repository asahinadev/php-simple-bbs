<?php
declare(strict_types = 1);
namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Controller\Component\UserMailerComponent $UserMailer
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

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

        parent::beforeFilter($event);

        // ユーザー登録・ログインはすべて許可
        $this->Authentication->allowUnauthenticated([
            'login',
            "add"
        ]);

        $this->loadComponent("UserMailer");

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));

    }

    /**
     * View method
     *
     * @param string|null $id
     *            User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $user = $this->Users->get($id, [
            'contain' => [
                'Posts'
            ],
        ]);

        $this->set(compact('user'));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                // メール送信
                $this->UserMailer->registMail($user);

                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));

    }

    /**
     * Edit method
     *
     * @param string|null $id
     *            User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        //
        if ($user->id != $this->getIdentityData("id")) {
            $this->Flash->error(__('Unauthorized Operations.'));
            return $this->redirect([
                'action' => 'index'
            ]);
        }

        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));

    }

    /**
     * Delete method
     *
     * @param string|null $id
     *            User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $user = $this->Users->get($id);

        //
        if ($user->id != $this->getIdentityData("id")) {
            $this->Flash->error(__('Unauthorized Operations.'));
            return $this->redirect([
                'action' => 'index'
            ]);
        }

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        }
        else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect([
            'action' => 'index'
        ]);

    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function login()
    {

        $user = $this->Users->newEmptyEntity();

        $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/';
            return $this->redirect($target);
        }
        if ($this->request->is('post') && ! $result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }

        $this->set(compact('user'));

    }

    public function logout()
    {

        $this->Authentication->logout();

        $this->Flash->success(__('logged out'));

        return $this->redirect([
            'action' => 'login'
        ]);

    }

}
