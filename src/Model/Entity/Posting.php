<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Posting extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
}
