<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArticleFixture
 *
 */
class ArticleFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'article';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'title' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'content' => ['type' => 'string', 'length' => 10000, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'createAt' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'updateAt' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'author' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'category' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'article_user_id_fk' => ['type' => 'index', 'columns' => ['author'], 'length' => []],
            'article_category_id_fk' => ['type' => 'index', 'columns' => ['category'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'article_id_uindex' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'article_category_id_fk' => ['type' => 'foreign', 'columns' => ['category'], 'references' => ['category', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'article_user_id_fk' => ['type' => 'foreign', 'columns' => ['author'], 'references' => ['user', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'title' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet',
            'createAt' => '2017-11-23 09:20:26',
            'updateAt' => '2017-11-23 09:20:26',
            'author' => 1,
            'category' => 1
        ],
    ];
}
