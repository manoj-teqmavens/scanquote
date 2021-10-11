<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
  <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="#">Employee Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>User Listing</span></li>
                      </ol>
                    </nav>
                </div>  
              </div>
              </div>  
             
              <div class="card">
                <div class="card-body">    
                    <?= $this->Html->link('Create New Employee', ['controller' => 'users', 'action' => 'add', 'class' => 'btn btn-primary btn-lg btn-block']);?>
                    
              <div class="row">
                <div class="form-group"></div>
                <?= $this->Form->create();?>
               <div class="form-group">
                <?= $this->Form->control('search_employee',['class' => 'form-control', 'label' => false,'placeholder' => 'Search']);?>
                <?= $this->Form->button(__('go'),['class' => 'btn btn-outline-info btn-fw']) ?>
               </div>
               <?= $this->Form->end();?>
                <div class="col-12">
                  <?= $this->Paginator->limitControl([20 => 20,50 => 50, 100 => 100],null,['label' => __('Show Entities')]);?>
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th><?= __('Sr. No.') ?></th>
                            <th><?= __('Full Name') ?></th>
                            <th><?= $this->Paginator->sort('email') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Verified') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($users as  $sn =>  $user): ?>
                          <?php $verified = $this->Number->format($user->verified);?>
                <tr>
                    <td><?= $this->Number->format($sn+1) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h(($user->status == 1)?"Active":"Inactive") ?></td>
                    <td><?= isset($verified)?"Yes":"No"; ?></td>
                    <td><?= h($user->created) ?></td>
                    <td class="actions">
                      <a href="<?= $this->Url->build(['controller' => 'users','action' => 'view',  $user->id]); ?>"><i class=" icon-info menu-icon"></i></a>
                      <a href="<?= $this->Url->build(['controller' => 'users','action' => 'edit',  $user->id]); ?>"><i class="icon-note  menu-icon"></i></a>
                        <?php 

                    
                    
echo $this->Form->postLink(
                '<i class="icon-trash icon-white"></i>',
                array(
                      'action'   => 'delete', $user->id
                      ),
                array(
                      'escape'   => false,
                      'confirm'  => 'Are you sure ?'
                     ));

                        ?>

                    </td>
                </tr>
                <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- partial -->
      </div>

 <?= $this->Html->script('vendor.bundle.base') ?>
 <?= $this->Html->script('off-canvas') ?>
 <?= $this->Html->script('hoverable-collapse') ?>
 <?= $this->Html->script('template') ?>
 <?= $this->Html->script('settings') ?>
 <?= $this->Html->script('todolist') ?>










