<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'companies', 'action' => 'index']); ?>">Company Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Job Detail</span></li>
                      </ol>
                    </nav>
                </div>  
              </div>
              </div>  
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                  </p>
                  <?= $this->Html->link(__('List Companies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>   
                  <?= $this->Html->link(__('Back'), ['controller' => 'Companies','action' => 'view', $job->company_id], ['class' => 'side-nav-item']) ?>
                    <div class="form-group">
                       <?= __('Job Name') ?>
                       <?= h($job->job_name) ?>
                    </div>
                    <div class="form-group">
                     <?= __('Bid No') ?>
                     <?= h($job->bid_no) ?>
                    </div>
                    <div class="form-group">
                      <?= __('Estimator') ?>
                      <?= $job->has('estimator') ? $this->Html->link($job->estimator->estimator_name, ['controller' => 'Estimators', 'action' => 'view', $job->estimator->id]) : '' ?>
                    </div>

                    <div class="form-group">
                      <?= __('Company') ?>
                      <?= $job->has('company') ? $this->Html->link($job->company->company_name, ['controller' => 'Companies', 'action' => 'view', $job->company->id]) : '' ?>
                    </div>
                    <div class="form-group">
                      <?= __('Email') ?>
                      <?= h($job->email) ?>
                    </div>
                    <div class="form-group">
                      <?= __('Contact No') ?>
                      <?= h($job->contact_no) ?>
                    </div>
                    <div class="form-group">
                      <?= __('Scanned By') ?>
                      <?= $job->user->username ?>
                    </div>
                    <div class="form-group">
                      <?= __('Job Status') ?>
                      <?= $this->Number->format($job->job_status) ?>
                    </div>
                    <div class="form-group">
                      <?= __('Scanned At') ?>
                      <?= h($job->scanned_at) ?>
                    </div>
                </div>
              </div>
            </div>

     