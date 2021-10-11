<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorymarkup $categorymarkup
 * @var \Cake\Collection\CollectionInterface|string[] $companies
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 */
?>
   <?= $this->Html->css(['selectize.bootstrap3.min']) ?>
   <?= $this->Html->script('bootstrap.min.js') ?>
   <?= $this->Html->script('selectize.min') ?>

  

<div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'Categorymarkups', 'action' => 'index']); ?>">Markup Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Add New Company</span></li>
                      </ol>
                    </nav>
                </div>  
              </div>
              </div>  

              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Company Detail:
                  </p>
                  <?= $this->Form->create($categorymarkup); 

                  ?>
                    <div class="form-group">
                        <?php ?>
                      <?= $this->Form->control('company_id',['class'=> 'form-control  search-sel','options' => $companies,'empty'=>'Please select', 'placeholder' => 'Select/Search Company Name']); ?>
                    </div>
                     <div class="row form-group   after-add-more">
                    <div class="col-sm-4">
                      <?= $this->Form->control('category_id[]',['class'=> 'form-control col-sm-6 search-sel','empty'=>'Please select','options' => $categories , 'label' => 'Category Markup','placeholder' => 'Search/Select Category']); ?>
                    </div>
                    
                     <div class="col-sm-4">
                      <?= $this->Form->control('category_mark_up[]',['type'=>'number', 'class'=> 'form-control col-sm-6', 'label' => '','placeholder' => 'Assign Markup %']); ?>
                    </div>
                    
                    <div class="col-sm-4">
                      <?php  $status = [1 =>'Active', 0 =>'Block'];
                      ?>  
                      <?= $this->Form->control('category_status[]',['type'=>'select', 'class'=> 'form-control  col-sm-6','default' => '1','label'=>'', 'empty'=>'Please select', 'options' => $status]);?>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group change">
                            <label for="">&nbsp;</label><br/>
                            <a class="btn btn-success add-more">+</a>
                        </div>
                    </div>
                    </div> 
                    <div class="row form-group   after-add-item-more">
                    <div class="col-sm-4">
                      <?= $this->Form->control('item_id[]',['class'=> 'form-control col-sm-6 search-sel','options' => $items ,'empty' => 'please select','placeholder' => 'Search/Select Item SKU', 'label' => 'Item Markup']); ?>
                    </div>
                    
                     <div class="col-sm-4">
                      <?= $this->Form->control('item_mark_up[]',['type'=>'number', 'class'=> 'form-control col-sm-6', 'label' => '','placeholder' => 'Assign Markup %']); ?>
                    </div>
                    
                    <div class="col-sm-4">
                      <?php  $status = [1 =>'Active', 0 =>'Block'];
                      ?>  
                      <?= $this->Form->control('item_status[]',['type'=>'select', 'class'=> 'form-control  col-sm-6','default' => '1','label'=>'', 'empty'=>'Please select', 'options' => $status]);?>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group change-item">
                            <label for="">&nbsp;</label><br/>
                            <a class="btn btn-success add-item-more">+</a>
                        </div>
                    </div>
                    </div>  
                    <?= $this->Form->button(__('Save'),['class' => 'btn btn-primary me-2']) ?>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-light']) ?>  
                 <?= $this->Form->end(); ?>
                </div>
              </div>
             
  <script type="text/javascript">
  $(document).ready(function() {
    $("body").on("click",".add-more",function(){ 


       $('.search-sel').each(function(){ // do this for every select with the 'combobox' class
        if ($(this)[0].selectize) { // requires [0] to select the proper object
          var value = $(this).val(); // store the current value of the select/input
          $(this)[0].selectize.destroy(); // destroys selectize()
          $(this).val(value);  // set back the value of the select/input
        }
      });
        var html = $(".after-add-more").first().clone();
        //  $(html).find(".change").prepend("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
          $(html).find(".change").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>-</a>");
         // $(html).find('.selectize-control').remove();
          //$(html).find('.search-sel'). selectizeme();
          
           //$(html).find(".change").find("input[class*='subcat']").attr('value','');
          $(".after-add-more").last().after(html);
          selectizeme();
    
          
    });
        $("body").on("click",".remove",function(){ 
        $(this).parents(".after-add-more").remove();
    });
    $("body").on("click",".add-item-more",function(){ 

        $('.search-sel').each(function(){ // do this for every select with the 'combobox' class
        if ($(this)[0].selectize) { // requires [0] to select the proper object
          var value = $(this).val(); // store the current value of the select/input
          $(this)[0].selectize.destroy(); // destroys selectize()
          $(this).val(value);  // set back the value of the select/input
        }
      });
        var html = $(".after-add-item-more").first().clone(); // where
        //  $(html).find(".change").prepend("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
          $(html).find(".change-item").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove-item'>-</a>");
          $(".after-add-item-more").last().after(html);
          selectizeme();
    });
        $("body").on("click",".remove-item",function(){ 
        $(this).parents(".after-add-item-more").remove();
    });  

   /*  $('.search-sel').selectize({
          sortField: 'text'
      });  */  
    

  
});
  function selectizeme(){
      $('.search-sel').selectize({
        create: true,
        sortField: 'text'
      });
    }
   $(function(){ // same as $(document).ready()
      selectizeme(); // selectize all .combobox
     });
</script>          



