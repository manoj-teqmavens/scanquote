<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productcatalog $productcatalog
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $types
 */
?>
<div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a >Item Management</a></li>
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'productcatalogs', 'action' => 'index']); ?>">Manage Catalog</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Upload Item</span></li>
                      </ol>
                    </nav>
                </div>  

              </div>
              </div>  
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                	<?= $this->Form->create(null, ['url'=> ['action' => 'excel',], 'type'=>'POST']); ?>
    <button type="submit" class="btn btn-primary">Download sample EXcel</button>
<?= $this->Form->end() ?>
                  <p class="card-description">
                    Upload file:
                  </p>
                  <?= $this->Form->create($productcatalog,['type' => 'file']); ?>
                    <div class="form-group">
                        <?php ?>
                      <?= $this->Form->file('item_file',['class'=> 'form-control','label' =>false ]); ?>
                    </div>
                    <?= $this->Form->button(__('Save'),['class' => 'btn btn-primary me-2']) ?>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-light']) ?>  
                 <?= $this->Form->end(); ?>
                </div>
              </div>
            </div>
