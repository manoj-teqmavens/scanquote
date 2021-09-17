<?php use Cake\I18n\FrozenTime;?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'companies', 'action' => 'index']); ?>">Company Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Company Listing</span></li>
                      </ol>
                    </nav>
                </div>  
              </div>
              </div>  
             
              <div class="card">
                <div class="card-body">    
                    <?= $this->Html->link('Add New Company', ['controller' => 'companies', 'action' => 'add', 'class' => 'btn btn-primary btn-lg btn-block']);?>
                    
              <div class="row">
               <div class="form-group"></div>
               <?= $this->Form->create();?>
               <div class="form-group">
                <?= $this->Form->control('search_company',['class' => 'form-control', 'label' => false,'placeholder' => 'Search']);?>
                <?= $this->Form->button(__('go'),['class' => 'btn btn-outline-info btn-fw']) ?>
               </div>
               <?= $this->Form->end();?>
                <div class="col-12">
                  <?= $this->Paginator->limitControl([20 => 20,50 => 50, 100 => 100],null,['label' => __('Show Entities')]);?>

                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('company_name') ?></th>
                            <th><?= $this->Paginator->sort('email') ?></th>
                            <th><?= $this->Paginator->sort('contact_no') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th colspan="2" class="actions"><?= __('Actions') ?></th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($companies as $companie): ?>
                <tr>
                    <td><?= $companie->company_name; ?></td>
                    <td><?= $companie->email;?></td>
                    <td><?= $companie->contact_no;?></td>
                    <td>
                      <?php 
$now = FrozenTime::parse($companie->created);
echo $now->i18nFormat('MM/dd/yyyy');
                      ?>

                      </td>
                    <td><?= $this->Html->link('view',['action' => 'view', $companie->id]); ?>
                      <?= $this->Html->link('Edit',['action' => 'edit', $companie->id]); ?></td>
                    <td><?= $this->Form->postLink(
                        'Delete',
                        ['action' => 'delete',  $companie->slug],
                        ['confirm' => 'Are You sure?']
                    ); ?></td>
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