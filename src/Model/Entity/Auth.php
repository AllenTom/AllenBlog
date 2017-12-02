<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Auth Entity
 *
 * @property int $id
 * @property string $token_key
 * @property int $user
 */
class Auth extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'token_key' => true,
        'user' => true
    ];


    public function createAuth(int $user)
    {
        $this->user = $user;
        $this->token_key = bin2hex(random_bytes(10));
    }



}
