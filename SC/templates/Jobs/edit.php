<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 * @var string[]|\Cake\Collection\CollectionInterface $companies
 * @var string[]|\Cake\Collection\CollectionInterface $estimators
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $job->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jobs form content">
            <?= $this->Form->create($job) ?>
            <fieldset>
                <legend><?= __('Edit Job') ?></legend>
                <?php
                    echo $this->Form->control('job_name');
                    echo $this->Form->control('bid_no');
                    echo $this->Form->control('scanned_at');
                    echo $this->Form->control('scanned_by');
                    echo $this->Form->control('job_status');
                    echo $this->Form->control('estimator_id', ['options' => $estimators]);
                    echo $this->Form->control('company_id', ['options' => $companies]);
                    echo $this->Form->control('email');
                    echo $this->Form->control('contact_no');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
