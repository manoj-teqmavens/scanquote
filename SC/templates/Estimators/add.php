<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimator $estimator
 * @var \Cake\Collection\CollectionInterface|string[] $companies
 */
?>
<div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="#">Company Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Add New Estimator</span></li>
                      </ol>
                    </nav>
                </div>  
              </div>
              </div>  
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Estimator Detail:
                  </p>
                  <div class="form-group">
                    <label>Company Name: </label>
                  </div>
                  <div class="form-group">
                    <label><?= $company->company_name ?></label>
                  </div>
                  <?php //$this->Html->link(__('List Companies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>   
                  <?= $this->Form->create($estimator); ?>
                    <div class="form-group">
                        <?php echo $this->Form->control('company_id',['type'=>'hidden','value'=> $company->id]);?>
                      <?= $this->Form->control('estimator_name',['class'=> 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?= $this->Form->control('email',['class'=> 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?= $this->Form->control('phone_no',['class'=> 'form-control']); ?>
                    </div>
                    
                    <div class="form-group">
                      <?php  $status = [1 =>'Active', 0 =>'Block'];
                      ?>  
                      <?= $this->Form->control('status',['type'=>'select', 'class'=> 'form-control','empty'=>'Please select', 'options' => $status]);?>
                      </div>
                      
                    <?= $this->Form->button(__('Save'),['class' => 'btn btn-primary me-2']) ?>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                    <?= $this->Html->link(__('Cancel'), ['controller' => 'Companies','action' => 'edit', $company->id], ['class' => 'btn btn-light']) ?>  
                 <?= $this->Form->end(); ?>
                </div>
              </div>

                  </div>