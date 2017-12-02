<?php
/**
 * Created by IntelliJ IDEA.
 * User: TakayamaAren
 * Date: 11/23/2017
 * Time: 12:12 PM
 */


/**
 * Auth Controller
 *
 * @property \App\Model\Table\AuthTable $Auth
 *
 * @method \App\Model\Entity\Auth[] paginate($object = null, array $settings = [])
 */

namespace App\Controller;

use App\Model\Entity\Auth;
use Cake\ORM\TableRegistry;

class LoginController extends AppController
{
    public function index()
    {

    }

    public function auth()
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
            $token = new Auth();
            $token->createAuth($userId);
            TableRegistry::get('Auth')->save($token);
            $this->Cookie->write("token", $token->token_key);
            $this->redirect('/');
        }
    }
}
