<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class UserSale extends Entity
{
    protected $_accessible = [
        'user_id' => true,
        'sale_id' => true,
        'stat_created' => true,
        'rec_state' => true,
        'user' => true,
        'sale' => true,
    ];
}
