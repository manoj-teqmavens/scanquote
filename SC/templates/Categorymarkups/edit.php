<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorymarkup $categorymarkup
 * @var string[]|\Cake\Collection\CollectionInterface $companies
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categorymarkup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categorymarkup->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Categorymarkups'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categorymarkups form content">
            <?= $this->Form->create($categorymarkup) ?>
            <fieldset>
                <legend><?= __('Edit Categorymarkup') ?></legend>
                <?php
                    echo $this->Form->control('company_id', ['options' => $companies]);
                    echo $this->Form->control('category_id', ['options' => $categories]);
                    echo $this->Form->control('mark_up');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
