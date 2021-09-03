<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimator $estimator
 * @var \Cake\Collection\CollectionInterface|string[] $companies
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Estimators'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="estimators form content">
            <?= $this->Form->create($estimator) ?>
            <fieldset>
                <legend><?= __('Add Estimator') ?></legend>
                <?php
                    echo $this->Form->control('estimator_name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_no');
                    //echo $this->Form->control('status');
                    $status = [1 =>'Active', 0 =>'Block'];
                    echo $this->Form->select('status', $status,  ['empty' => '(choose one)']);
                    echo $this->Form->control('company_id', ['options' => $companies]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
