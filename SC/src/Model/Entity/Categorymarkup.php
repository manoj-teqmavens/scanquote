<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Categorymarkup Entity
 *
 * @property int $id
 * @property int $company_id
 * @property int $category_id
 * @property string $mark_up
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Category $category
 */
class Categorymarkup extends Entity
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
        'category_id' => true,
        'mark_up' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'company' => true,
        'category' => true,
    ];
}
