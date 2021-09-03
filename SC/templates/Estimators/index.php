<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimator[]|\Cake\Collection\CollectionInterface $estimators
 */
?>
<div class="estimators index content">
    <?= $this->Html->link(__('New Estimator'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Estimators') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('estimator_name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone_no') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('company_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estimators as $estimator): ?>
                <tr>
                    <td><?= $this->Number->format($estimator->id) ?></td>
                    <td><?= h($estimator->estimator_name) ?></td>
                    <td><?= h($estimator->email) ?></td>
                    <td><?= h($estimator->phone_no) ?></td>
                    <td><?= $this->Number->format($estimator->status) ?></td>
                    <td><?= $estimator->has('company') ? $this->Html->link($estimator->company->id, ['controller' => 'Companies', 'action' => 'view', $estimator->company->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $estimator->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estimator->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estimator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estimator->id)]) ?>
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
