<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a >Item Management</a></li>
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'categories', 'action' => 'index']); ?>">Manage Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Edit New Category</span></li>
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
                  <?= $this->Form->create($category); ?>
                    
                    <div class="form-group">
                        <?php ?>
                      <?= $this->Form->control('category',['class'=> 'form-control']); ?>
                    </div>
                    <div class="form-group">
                          <?php  foreach ($category->child_categories as  $scat) {?>
                         <div class="subcatcls-<?php echo $scat->id?>">   
                        <?php echo $this->Form->control('sub_category[exist]['.$scat->id.']',['class' => 'form-control ','label' => 'Sub Category' , 'value' => $scat->category]);?>
                      <label for=''>&nbsp;</label><br/><a class='btn btn-danger remove-sc' rel="<?= $this->Url->build(['controller' => 'categories','action' => 'delete']); ?>" data-id='<?php echo $scat->id?>' >- Remove</a>
                    </div>
                      <?php }?>
                      
                      </div>
                    <div class="form-group  after-add-more">

                      <?php  
                      echo $this->Form->control('sub_category[]',['class' => 'form-control','label' => 'Sub Category','escape' => false]);
                      ?>
                      
                       <div class="col-md-2">
                        <div class="form-group change">
                            <label for="">&nbsp;</label><br/>
                            <a class="btn btn-success add-more">+ Add More</a>
                        </div>
                    </div>
                     </div>
                   
                    <div class="form-group">
                       <?php $markNumber = range(1,100);
                             unset($markNumber[0]);
                       ?>
                      <?= $this->Form->control('markup',['type'=>'select','class'=> 'form-control','empty'=>'Please select', 'options' => $markNumber]); ?>
                    </div>
                    <div class="form-group">
                      <?php  $status = [1 =>'Active', 0 =>'Block'];
                      ?>  
                      <?= $this->Form->control('status',['type'=>'select', 'class'=> 'form-control','empty'=>'Please select', 'options' => $status]);?>
                      </div>
                      
                    <?= $this->Form->button(__('Update'),['class' => 'btn btn-primary me-2']) ?>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-light']) ?>  
                 <?= $this->Form->end(); ?>
                </div>
              </div>

                  </div>

<script type="text/javascript">
  $(document).ready(function() {
    $("body").on("click",".add-more",function(){ 
        var html = $(".after-add-more").first().clone();
        $(html).find(".change").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
        $(".after-add-more").last().after(html);
    });
        $("body").on("click",".remove",function(){ 
        $(this).parents(".after-add-more").remove();
    });
    $("body").on("click",".remove-sc",function(){ 
    
    var selectedValue = $(this).attr("data-id");
    

    var targeturl = $(this).attr('rel') + '/' + selectedValue;
    /*$.ajax({
      type: 'post',
      url: targeturl,
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      },
      success: function(response) {
        if (response) {
            $(this).parents(".subcatcls").remove();
        }
      },
      error: function(e) {
        alert("An error occurred: " + e.responseText.message);
        console.log(e);
      }
    });*/

    $.ajax( {
          type: 'post',
          dataType: 'json',
          url: targeturl,
          headers: {
            'X-CSRF-Token': $( '[name="_csrfToken"]' ).val()
          },
          data: {sub_category:selectedValue},
          /*success: function( data, textStatus, jqXHR ) {
            $(this).parents(".subcatcls").remove();
            if( textStatus === 'success' ) {
              // Do something
            }
          },*/
           success: function(data) {
            console.log(data);
            console.log($(this));
            $(".subcatcls-"+selectedValue).remove();
           },
          
        } );



  });    

});
</script>