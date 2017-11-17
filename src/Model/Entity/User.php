<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 11/17/2017
 * Time: 7:46 PM
 */

namespace App\Model\Entity;

use App\Model\Table\UserTable;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Class User
 * @package App\Model\Entity
 */
class User extends Entity
{

//    public $username;
//    public $password;
//
//    public function createUser(String $username, String $password)
//    {
//        $table = TableRegistry::get('User');
//        $tableEntity = $table->newEntity();
//        $tableEntity->username = $username;
//        $tableEntity->password = $password;
//        $table->save($tableEntity);
//    }
}