<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 12/2/2017
 * Time: 12:08 AM
 */

namespace App\Controller;


use App\Model\Entity\User;
use Cake\ORM\TableRegistry;

class RegisterController extends AppController
{
    public function index()
    {

    }
    public function create(){
        $table = TableRegistry::get("User");
        $user = $table->newEntity();
        $user->username = $this->request->getData("username");
        $user->password = $this->request->getData("password");
        $table->save($user);
        return $this->redirect("/login");
    }
}