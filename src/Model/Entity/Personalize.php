<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 11/18/2017
 * Time: 3:14 PM
 */

namespace App\Model\Entity;


use Cake\Filesystem\File;
use Cake\ORM\Entity;

class Personalize extends Entity
{
    public $title;


    /**
     * Personalize constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $file = new File('personalize.json');
        $json = $file->read(true, 'r', true);
        $obj = json_decode($json);
        $this->title = $obj->title;
    }

    public function save()
    {
        $file = new File('personalize.json');
        $savePersonalize = new Profile();
        $savePersonalize->title = $this->title;
        $json = json_encode($savePersonalize);
        $file->write($json);
    }
}