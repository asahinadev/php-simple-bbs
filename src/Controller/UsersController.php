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

        if (! $this->checkAdmin()) {
            // 管理ユーザーではない場合は確認画面に遷移
            $id = $this->getIdentityData("id");
            return $this->redirectAction("view", $id);
        }

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

        // 管理者か自分自身の場合のみ操作可能
        $this->checkUserId($id);

        // 情報の取得
        $user = $this->getEntity($this->Users, $id, 'Posts');

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

        // メソッド判定
        if ($this->isMethod('post')) {

            // 更新処理
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($saveUser = $this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                // メール送信
                $this->UserMailer->registMail($saveUser);

                // 変更画面に遷移
                $this->set(compact('edit', $saveUser->id));
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

        // 管理者か自分自身の場合のみ操作可能
        $this->checkUserId($id);

        // 情報の取得
        $user = $this->getEntity($this->Users, $id);

        // メソッド判定
        if ($this->isMethod('patch', 'post', 'put')) {

            // 更新処理
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                // 変更画面に遷移
                $this->set(compact('edit', $id));
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

        // 管理者か自分自身の場合のみ操作可能
        $this->checkUserId($id);

        $this->allowMethod('post', 'delete');
        $user = $this->getEntity($this->Users, $id);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        }
        else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirectAction('index');

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


    /**
     * Logout method
     *
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function logout()
    {

        $this->Authentication->logout();
        $this->Flash->success(__('logged out'));
        return $this->redirectAction('login');

    }

}
