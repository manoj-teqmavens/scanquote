<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Productcatalog Entity
 *
 * @property int $id
 * @property string $item
 * @property int $category_id
 * @property int|null $subcategory_id
 * @property string $price
 * @property int $type_id
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Subcategory $subcategory
 * @property \App\Model\Entity\Type $type
 */
class Productcatalog extends Entity
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
        'item' => true,
        'category_id' => true,
        'subcategory_id' => true,
        'price' => true,
        'type_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'subcategory' => true,
        'type' => true,
    ];
}
