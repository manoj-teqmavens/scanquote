<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property string $job_name
 * @property string $bid_no
 * @property \Cake\I18n\FrozenTime $scanned_at
 * @property int $scanned_by
 * @property int $job_status
 * @property int $estimator_id
 * @property int $company_id
 * @property string $email
 * @property string $contact_no
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Estimator $estimator
 */
class Job extends Entity
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
        'job_name' => true,
        'bid_no' => true,
        'scanned_at' => true,
        'scanned_by' => true,
        'job_status' => true,
        'estimator_id' => true,
        'company_id' => true,
        'email' => true,
        'contact_no' => true,
        'created' => true,
        'modified' => true,
        'company' => true,
        'estimator' => true,
    ];
}
