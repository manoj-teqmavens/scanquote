<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productcatalog $productcatalog
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 * @var string[]|\Cake\Collection\CollectionInterface $types
 */
?>
<div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a >Item Management</a></li>
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'productcatalogs', 'action' => 'index']); ?>">Manage Catalog</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Edit Item Detail</span></li>
                      </ol>
                    </nav>
                </div>  
              </div>
              </div>  
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Category Detail:
                  </p>
                  <?= $this->Form->create($productcatalog); ?>
                    
                    <div class="form-group">
                        <?php ?>
                      <?= $this->Form->control('item',['class'=> 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?= $this->Form->control('price',['class'=> 'form-control']); ?>
                    </div>
                    <?php 
                            $url = $this->Url->build(['controller' => 'productcatalogs', 'action' => 'subcategoryList']);
                    ?>
                    <div class="form-group">
                      <?= $this->Form->control('category_id', ['class'=> 'form-control','options' => $categories,'id'=>'categories','empty'=>'Please select',  'rel' => $url]);?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('subcategory_id',['class'=> 'form-control', 'empty' => 'Please select','id'=> 'subcategory', 'options' => $subcategories]);?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('type_id', ['class'=> 'form-control','options' => $types,'empty'=>'Please select']);?>
                    </div>
                    <div class="form-group">
                      <?php  $status = [1 =>'Active', 0 =>'Block'];
                      ?>  
                      <?= $this->Form->control('status',['type'=>'select', 'class'=> 'form-control','empty'=>'Please select', 'options' => $status]);?>
                      </div>
                      
                    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary me-2']) ?>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-light']) ?>  
                 <?= $this->Form->end(); ?>
                </div>
              </div>

                  </div>
<script type="text/javascript">
//var $ = jQuery;
$(function() {

    $('#categories').change(function() {
        
        var selectedValue = $(this).val();

        var targeturl = $(this).attr('rel') + '?id=' + selectedValue;
        $.ajax({
            type: 'get',
            url: targeturl,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            },
            success: function(response) {
                if (response) {
                    $('#subcategory').html(response);
                }
            },
            error: function(e) {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
    });
});
</script>
