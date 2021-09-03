<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estimator Entity
 *
 * @property int $id
 * @property string $estimator_name
 * @property string $email
 * @property string $phone_no
 * @property int $status
 * @property int $company_id
 *
 * @property \App\Model\Entity\Company $company
 */
class Estimator extends Entity
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
        'estimator_name' => true,
        'email' => true,
        'phone_no' => true,
        'status' => true,
        'company_id' => true,
        'company' => true,
    ];
}
