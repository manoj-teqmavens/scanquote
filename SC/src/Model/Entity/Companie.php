<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Companie extends Entity{
    protected $_accessible = [
        '*' => true,
        'id' => false

    ];
}