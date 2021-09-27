<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
 <div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'index']); ?>">Employee Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Create New User</span></li>
                      </ol>
                    </nav>
                </div>  
              </div>
              </div>  
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  
                  <p class="card-description">
                    Add Employee
                  </p>
                  <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>   
                  <?= $this->Form->create($user) ?>
                    <div class="form-group">
                      <?= $this->Form->control('username',['class' => 'form-control', 'placeholder' => 'Username']); ?>
                    </div>
                    <div class="form-group">
                      <?= $this->Form->control('email',['class' => 'form-control', 'placeholder' => 'Email']); ?>
                    </div>
                    <div class="form-group">
                      <?= $this->Form->control('password',['class' => 'form-control', 'placeholder' => 'Password']); ?>
                    </div>
                    <div class="form-group">
                      <?php  $status = [1 =>'Active', 0 =>'Block'];?>  
                      <?= $this->Form->control('status',['type'=>'select','class'=> 'form-control','empty'=>'Please select', 'options' => $status]);?>
                      </div>
                    
                    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary me-2']) ?>
                    <button class="btn btn-light">Cancel</button>
                 <?= $this->Form->end() ?>
                </div>
              </div>
            </div>
   
           
       