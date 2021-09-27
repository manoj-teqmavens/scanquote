<div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'companies', 'action' => 'index']); ?>">Company Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Edit Company</span></li>
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
                        <?= $this->Form->control('country',['type'=>'select', 'class'=> 'form-control','id'=> 'countries',  'rel' => $url,'options' => $countries]);?>

                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('state',['type'=>'select', 'class'=> 'form-control','id'=> 'states',  'rel' => $stateUrl,'options' => $states]);?>

                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('city',['type'=>'select', 'class'=> 'form-control','id'=> 'cities','options' => $cities]);?>

                    </div>
                    <div class="form-group">
                      <?php  $status = [1 =>'Active', 0 =>'Block'];
                      ?>  
                      <?= $this->Form->control('status',['type'=>'select', 'class'=> 'form-control','empty'=>'Please select', 'options' => $status]);?>
                      </div>
                      
                    <?= $this->Form->button(__('Update Company'),['class' => 'btn btn-primary me-2']) ?>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-light']) ?>  
                 <?= $this->Form->end(); ?>
                </div>
              </div>

                  </div>
 <div class="card">
                <div class="card-body">
                  <p class="card-description">
                    Estimator Detail:
                  </p>
                    <?= $this->Html->link(__('Add New Estimator'), ['controller' => 'Estimators','action' => 'add', $company->id], ['class' => 'button float-right']) ?>
                  <div class="row">
                 <?= $this->Form->create();?>
                 <div class="form-group"></div>
               <div class="form-group">
                <?= $this->Form->control('search_estimator',['class' => 'form-control', 'label' => false,'placeholder' => 'Search']);?>
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
                            <th><?=  __('Estimator Name') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Phone No') ?></th>
                            <th><?= __('Status') ?></th>
                            <th  class="actions"><?= __('Actions') ?></th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($company->estimators as $sn => $estimator): ?>
                <tr>
                    <td><?= $this->Number->format($sn+1) ?></td>
                    <td><?= $estimator->estimator_name; ?></td>
                    <td><?= $estimator->email;?></td>
                    <td><?= $estimator->phone_no;?></td>
                    <td><?= isset($estimator->status)?"Active":"Block";?></td>
                    <td><a href="<?= $this->Url->build(['controller' => 'Estimators','action' => 'edit',  $estimator->id]); ?>"><i class="icon-note  menu-icon"></i></a>
                    <?php echo $this->Form->postLink(
                '<i class="icon-trash icon-white"></i>',
                array(
                      'action'   => 'Estimators', $estimator->id
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
                </div>
              </div>
 
  </div>
              </div>

        