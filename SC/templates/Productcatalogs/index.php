<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productcatalog[]|\Cake\Collection\CollectionInterface $productcatalogs
 */
?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="">Item Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Manage Catalog</span></li>
                      </ol>
                    </nav>
                </div>  
              </div>
              </div>  
             
              <div class="card">
                <div class="card-body">    
                    <?= $this->Html->link('Add New Item', ['controller' => 'productcatalogs', 'action' => 'add', 'class' => 'btn btn-primary btn-lg btn-block']);?>
                    
              <div class="row">
               <div class="form-group"></div>
               <?= $this->Form->create();?>
               <div class="form-group">
                <?= $this->Form->control('search_catalog',['class' => 'form-control', 'label' => false,'placeholder' => 'Search']);?>
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
                            <th><?= $this->Paginator->sort('item') ?></th>
                            <th><?= __('Main Category') ?></th>
                            <th><?= __('Unit Type') ?></th>
                            <th><?= __('Price<br/>(Per Unit)') ?></th>
                            <th><?= __('Status') ?></th>
                            <th colspan="2" class="actions"><?= __('Actions') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($productcatalogs as $sn => $productcatalog): ?>    
                <tr>
                    <td><?= $this->Number->format($sn+1) ?></td>
                    <td><?= h($productcatalog->item) ?></td>
                    <td><?= $productcatalog->has('category') ? $productcatalog->category->category : '' ?></td>
                    <td><?= $productcatalog->has('type') ? $productcatalog->type->name : '' ?></td>
                    <td>$<?= h($productcatalog->price) ?></td>
                    <td><?= h(!empty($productcatalog->status)?"Active":"Block") ?></td>
                    <td><!-- <a href="<?php //$this->Url->build(['controller' => 'categories','action' => 'view',  $category->id]); ?>"><i class=" icon-info menu-icon"></i></a> -->
                      <a href="<?= $this->Url->build(['controller' => 'productcatalogs','action' => 'edit',  $productcatalog->id]); ?>"><i class="icon-note  menu-icon"></i></a>
                    <?php 
                   echo $this->Form->postLink(
                '<i class="icon-trash icon-white"></i>',
                array(
                      'action'   => 'delete', $productcatalog->id
                      ),
                array(
                      'class'    => 'tip',
                      'escape'   => false,
                      'confirm'  => 'Are you sure ?'
                     ));

                        ?></td>
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
      </div>
