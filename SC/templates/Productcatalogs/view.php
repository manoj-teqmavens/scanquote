<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productcatalog $productcatalog
 */
?>
<div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a>Item Management</a></li>
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'companies', 'action' => 'index']); ?>">Manage Catalog</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Item Detail</span></li>
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
                  <?= $this->Html->link(__('List Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>   
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productcatalog->id], ['class' => 'side-nav-item']) ?>
                    <div class="form-group">
                        <?= __('Item SKU: ') ?>
                      <?= h($productcatalog->item) ?>
                    </div>
                    <div class="form-group">
                      <?= __('Main Category: ') ?>
                      <?= h($productcatalog->category->category) ?>
                    </div>
                    <div class="form-group">
                      <?= __('Sub Category: ') ?>
                      <?= isset($productcatalog->sub_category->category)?$productcatalog->sub_category->category:'--'; ?>
                    </div>

                    <div class="form-group">
                      <?= __('Unit Type: ') ?>
                      <?= $productcatalog->type->name ?>
                    </div>
                     <div class="form-group">
                      <?= __('Status: ') ?>
                      <?= isset($productcatalog->status)?"Active":"Block" ?>
                    </div>
                     <div class="form-group">
                      <?= __('Price: ') ?>
                      <?= h($productcatalog->price) ?>
                    </div>
                     <div class="form-group">
                      <?= __('Default Markup: ') ?>
                      <?= $productcatalog->category->markup ?>
                    </div>
                </div>
              </div>
            </div>


