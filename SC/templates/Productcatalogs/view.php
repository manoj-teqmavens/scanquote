<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productcatalog $productcatalog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Productcatalog'), ['action' => 'edit', $productcatalog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Productcatalog'), ['action' => 'delete', $productcatalog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productcatalog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Productcatalogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Productcatalog'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productcatalogs view content">
            <h3><?= h($productcatalog->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= h($productcatalog->item) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $productcatalog->has('category') ? $this->Html->link($productcatalog->category->id, ['controller' => 'Categories', 'action' => 'view', $productcatalog->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= h($productcatalog->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $productcatalog->has('type') ? $this->Html->link($productcatalog->type->name, ['controller' => 'Types', 'action' => 'view', $productcatalog->type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productcatalog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subcategory Id') ?></th>
                    <td><?= $this->Number->format($productcatalog->subcategory_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($productcatalog->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($productcatalog->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($productcatalog->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
