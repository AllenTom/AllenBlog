<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Auth Controller
 *
 * @property \App\Model\Table\AuthTable $Auth
 *
 * @method \App\Model\Entity\Auth[] paginate($object = null, array $settings = [])
 */
class AuthController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $auth = $this->paginate($this->Auth);

        $this->set(compact('auth'));
        $this->set('_serialize', ['auth']);
    }

    /**
     * View method
     *
     * @param string|null $id Auth id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auth = $this->Auth->get($id, [
            'contain' => []
        ]);

        $this->set('auth', $auth);
        $this->set('_serialize', ['auth']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auth = $this->Auth->newEntity();
        if ($this->request->is('post')) {
            $auth = $this->Auth->patchEntity($auth, $this->request->getData());
            if ($this->Auth->save($auth)) {
                $this->Flash->success(__('The auth has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auth could not be saved. Please, try again.'));
        }
        $this->set(compact('auth'));
        $this->set('_serialize', ['auth']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Auth id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auth = $this->Auth->get($id);
        if ($this->Auth->delete($auth)) {
            $this->Flash->success(__('The auth has been deleted.'));
        } else {
            $this->Flash->error(__('The auth could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $username = $this->request->getData('username');
        $password = $this->request->getData('password');
        $result = TableRegistry::get('User')
            ->find()
            ->where(['username' => $username, 'password' => $password])
            ->toArray();
        if (empty($result)) {
            $this->redirect('/login');
        } else {
            $userId = $result[0]->id;
            $token = $this->Auth->newEntity();
            $token->user = $userId;
            $token->token_key = bin2hex(random_bytes(10));
            TableRegistry::get('Auth')->save($token);
            $this->Cookie->write("token",  $token->token_key);
            $this->redirect('/admin');
        }
    }
}
