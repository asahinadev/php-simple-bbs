<?php
declare(strict_types = 1);
namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
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

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $this->paginate = [
            'contain' => [
                'Users'
            ],
        ];
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));

    }

    /**
     * View method
     *
     * @param string|null $id
     *            Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $post = $this->Posts->get($id, [
            'contain' => [
                'Users'
            ],
        ]);

        $this->set(compact('post'));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());

            // 登録者のIDを設定
            $post->user_id = $this->getIdentityData("id");

            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', [
            'limit' => 200
        ]);
        $this->set(compact('post', 'users'));

    }

    /**
     * Edit method
     *
     * @param string|null $id
     *            Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $post = $this->Posts->get($id, [
            'contain' => [
                "Users"
            ],
        ]);

        //
        if ($post->user_id != $this->getIdentityData("id")) {
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
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', [
            'limit' => 200
        ]);
        $this->set(compact('post', 'users'));

    }

    /**
     * Delete method
     *
     * @param string|null $id
     *            Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $post = $this->Posts->get($id);

        //
        if ($post->user_id != $this->getIdentityData("id")) {
            $this->Flash->error(__('Unauthorized Operations.'));
            return $this->redirect([
                'action' => 'index'
            ]);
        }

        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        }
        else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect([
            'action' => 'index'
        ]);

    }

}
