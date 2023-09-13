<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property int $sale_id
 * @property \Cake\I18n\FrozenTime|null $book_arrivedate
 * @property string|null $book_current_stay
 * @property \Cake\I18n\FrozenTime|null $book_meetdate
 * @property int|null $book_meetperiod
 * @property string|null $book_meetplace
 * @property \Cake\I18n\FrozenTime $stat_created
 * @property int $rec_state
 *
 * @property \App\Model\Entity\Sale $sale
 */
class Book extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'sale_id' => true,
        'book_arrivedate' => true,
        'book_current_stay' => true,
        'book_meetdate' => true,
        'book_meetperiod' => true,
        'book_meetplace' => true,
        'stat_created' => true,
        'rec_state' => true,
        'sale' => true,
    ];
}
