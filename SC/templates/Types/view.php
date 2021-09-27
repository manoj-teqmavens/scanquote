<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type $type
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Type'), ['action' => 'edit', $type->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Type'), ['action' => 'delete', $type->id], ['confirm' => __('Are you sure you want to delete # {0}?', $type->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="types view content">
            <h3><?= h($type->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($type->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($type->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($type->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($type->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($type->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Productcatalogs') ?></h4>
                <?php if (!empty($type->productcatalogs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Item') ?></th>
                            <th><?= __('Company Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Subcategory Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Type Id') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($type->productcatalogs as $productcatalogs) : ?>
                        <tr>
                            <td><?= h($productcatalogs->id) ?></td>
                            <td><?= h($productcatalogs->item) ?></td>
                            <td><?= h($productcatalogs->company_id) ?></td>
                            <td><?= h($productcatalogs->category_id) ?></td>
                            <td><?= h($productcatalogs->subcategory_id) ?></td>
                            <td><?= h($productcatalogs->price) ?></td>
                            <td><?= h($productcatalogs->type_id) ?></td>
                            <td><?= h($productcatalogs->status) ?></td>
                            <td><?= h($productcatalogs->created) ?></td>
                            <td><?= h($productcatalogs->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Productcatalogs', 'action' => 'view', $productcatalogs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Productcatalogs', 'action' => 'edit', $productcatalogs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Productcatalogs', 'action' => 'delete', $productcatalogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productcatalogs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
