<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimator $estimator
 * @var string[]|\Cake\Collection\CollectionInterface $companies
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $estimator->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $estimator->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Estimators'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="estimators form content">
            <?= $this->Form->create($estimator) ?>
            <fieldset>
                <legend><?= __('Edit Estimator') ?></legend>
                <?php
                    echo $this->Form->control('estimator_name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_no');
                    echo $this->Form->control('status');
                    echo $this->Form->control('company_id', ['options' => $companies]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
