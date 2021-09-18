<div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'companies', 'action' => 'index']); ?>">Company Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Add New Company</span></li>
                      </ol>
                    </nav>
                </div>  
              </div>
              </div>  
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Company Detail:
                  </p>
                  <?= $this->Html->link(__('List Companies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>   
                  <?= $this->Form->create($company); ?>
                  <?php if($identity->role == 1){?>
                  <div class="form-group">
                      <?= $this->Form->control('user_id',['type'=>'select', 'class'=> 'form-control','id'=> 'userid','empty'=>'Please select',  'options' => $users]);?>

                    </div>
                    <?php }else{
                      echo $this->Form->control('user_id',['type'=>'hidden','value'=>$identity->id]);
                    }?>
                    <div class="form-group">
                    	<?php ?>
                      <?= $this->Form->control('company_name',['class'=> 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?= $this->Form->control('email',['class'=> 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?= $this->Form->control('contact_no',['class'=> 'form-control']); ?>
                    </div>
                    <?php 
							$url = $this->Url->build(['controller' => 'companies', 'action' => 'countryStates']);
							$stateUrl = $this->Url->build(['controller' => 'companies', 'action' => 'stateCities']);
                    ?>
                    <div class="form-group">
                    	<?= $this->Form->control('country',['type'=>'select', 'class'=> 'form-control','id'=> 'countries','empty'=>'Please select',  'rel' => $url,'options' => $countries]);?>

                    </div>
                    <div class="form-group">
                    	<?= $this->Form->control('state',['type'=>'select', 'class'=> 'form-control','id'=> 'states','empty'=>'Please select',  'rel' => $stateUrl]);?>

                    </div>
                    <div class="form-group">
                    	<?= $this->Form->control('city',['type'=>'select', 'class'=> 'form-control','id'=> 'cities']);?>

                    </div>
                    <div class="form-group">
                      <?= $this->Form->control('postal_code',['class'=> 'form-control']);?>

                    </div>
                    <div class="form-group">
                      <?php  $status = [1 =>'Active', 0 =>'Block'];
                      ?>  
                      <?= $this->Form->control('status',['type'=>'select', 'class'=> 'form-control','empty'=>'Please select', 'options' => $status]);?>
                      </div>
                    
                    <?= $this->Form->button(__('Save Company'),['class' => 'btn btn-primary me-2']) ?>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-light']) ?>  
                 <?= $this->Form->end(); ?>
                </div>
              </div>
            </div>
 
<?php //$this->append('script'); ?>


<?php //$this->start('script'); ?>

<script type="text/javascript">
//var $ = jQuery;
$(function() {

	$('#countries').change(function() {
		
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
					$('#states').html(response);
				}
			},
			error: function(e) {
				alert("An error occurred: " + e.responseText.message);
				console.log(e);
			}
		});
	});
	$('#states').change(function(){
		var selectedstate = $(this).val();
		var targetStateurl = $(this).attr('rel')+'?id=' +selectedstate;
		$.ajax({
			type:'get',
			url: targetStateurl,
			beforeSend: function(xhr){
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			},
			success: function(response) {
				if (response) {
					$('#cities').html(response);
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
<?php //$this->end(); ?>
