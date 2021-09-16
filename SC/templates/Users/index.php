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
                    <?= $this->Html->link('Create New User', ['controller' => 'users', 'action' => 'add', 'class' => 'btn btn-primary btn-lg btn-block']);?>
                    
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
                            <th><?= $this->Paginator->sort('username') ?></th>
                            <th><?= $this->Paginator->sort('email') ?></th>
                            <th><?= $this->Paginator->sort('status') ?></th>
                            <th><?= $this->Paginator->sort('verified') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($users as $user): ?>
                          <?php $verified = $this->Number->format($user->verified);?>
                <tr>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h(isset($user->status)?"Active":"Block") ?></td>
                    <td><?= isset($verified)?"Yes":"No"; ?></td>
                    <td><?= h($user->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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










