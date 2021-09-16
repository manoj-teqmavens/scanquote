<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jobs view content">
            <h3><?= h($job->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Job Name') ?></th>
                    <td><?= h($job->job_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bid No') ?></th>
                    <td><?= h($job->bid_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estimator') ?></th>
                    <td><?= $job->has('estimator') ? $this->Html->link($job->estimator->id, ['controller' => 'Estimators', 'action' => 'view', $job->estimator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Company') ?></th>
                    <td><?= $job->has('company') ? $this->Html->link($job->company->id, ['controller' => 'Companies', 'action' => 'view', $job->company->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($job->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact No') ?></th>
                    <td><?= h($job->contact_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($job->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Scanned By') ?></th>
                    <td><?= $this->Number->format($job->scanned_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Job Status') ?></th>
                    <td><?= $this->Number->format($job->job_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Scanned At') ?></th>
                    <td><?= h($job->scanned_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($job->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($job->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
