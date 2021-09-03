<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimator $estimator
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Estimator'), ['action' => 'edit', $estimator->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Estimator'), ['action' => 'delete', $estimator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estimator->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Estimators'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Estimator'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="estimators view content">
            <h3><?= h($estimator->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Estimator Name') ?></th>
                    <td><?= h($estimator->estimator_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($estimator->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone No') ?></th>
                    <td><?= h($estimator->phone_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company') ?></th>
                    <td><?= $estimator->has('company') ? $this->Html->link($estimator->company->id, ['controller' => 'Companies', 'action' => 'view', $estimator->company->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($estimator->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($estimator->status) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
