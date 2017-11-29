<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Cake\I18n\FrozenTime $createAt
 * @property \Cake\I18n\FrozenTime $updateAt
 * @property int $author
 * @property int $category
 */
class Article extends Entity
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
        'title' => true,
        'content' => true,
        'createAt' => true,
        'updateAt' => true,
        'author' => true,
        'category' => true
    ];
}
