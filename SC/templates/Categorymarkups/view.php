<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorymarkup $categorymarkup
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Categorymarkup'), ['action' => 'edit', $categorymarkup->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Categorymarkup'), ['action' => 'delete', $categorymarkup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categorymarkup->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categorymarkups'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Categorymarkup'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categorymarkups view content">
            <h3><?= h($categorymarkup->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Company') ?></th>
                    <td><?= $categorymarkup->has('company') ? $this->Html->link($categorymarkup->company->id, ['controller' => 'Companies', 'action' => 'view', $categorymarkup->company->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $categorymarkup->has('category') ? $this->Html->link($categorymarkup->category->id, ['controller' => 'Categories', 'action' => 'view', $categorymarkup->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Mark Up') ?></th>
                    <td><?= h($categorymarkup->mark_up) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($categorymarkup->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($categorymarkup->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($categorymarkup->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($categorymarkup->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
