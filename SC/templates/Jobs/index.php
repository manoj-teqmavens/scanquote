<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>
<div class="jobs index content">
    <?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Jobs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('job_name') ?></th>
                    <th><?= $this->Paginator->sort('bid_no') ?></th>
                    <th><?= $this->Paginator->sort('scanned_at') ?></th>
                    <th><?= $this->Paginator->sort('scanned_by') ?></th>
                    <th><?= $this->Paginator->sort('job_status') ?></th>
                    <th><?= $this->Paginator->sort('estimator_id') ?></th>
                    <th><?= $this->Paginator->sort('company_id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('contact_no') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jobs as $job): ?>
                <tr>
                    <td><?= $this->Number->format($job->id) ?></td>
                    <td><?= h($job->job_name) ?></td>
                    <td><?= h($job->bid_no) ?></td>
                    <td><?= h($job->scanned_at) ?></td>
                    <td><?= $this->Number->format($job->scanned_by) ?></td>
                    <td><?= $this->Number->format($job->job_status) ?></td>
                    <td><?= $job->has('estimator') ? $this->Html->link($job->estimator->id, ['controller' => 'Estimators', 'action' => 'view', $job->estimator->id]) : '' ?></td>
                    <td><?= $job->has('company') ? $this->Html->link($job->company->id, ['controller' => 'Companies', 'action' => 'view', $job->company->id]) : '' ?></td>
                    <td><?= h($job->email) ?></td>
                    <td><?= h($job->contact_no) ?></td>
                    <td><?= h($job->created) ?></td>
                    <td><?= h($job->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
