<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Itemsmarkup Entity
 *
 * @property int $id
 * @property int $company_id
 * @property int $item_id
 * @property string $markup
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Item $item
 */
class Itemsmarkup extends Entity
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
        'company_id' => true,
        'item_id' => true,
        'markup' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'company' => true,
        'item' => true,
    ];
}
