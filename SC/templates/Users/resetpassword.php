 <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                    <?= $this->Html->image('logo.svg', ['alt' => 'logo'])?>
              </div>
              <?= $this->Flash->render() ?>
              <h4>Scan Quote</h4>
              <h6 class="font-weight-light">Reset password.</h6>
              <!-- <form class="pt-3"> -->
              <?= $this->Form->create() ?>  
                <div class="form-group">
                  
                  <?= $this->Form->control('password', ['label' => false,'required' => true,'class' => 'form-control form-control-lg', 'placeholder' => 'password']) ?>
                </div>
              	<div class="mt-3">
                  <?= $this->Form->submit(__('Submit'),['class' => 'btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn']); ?>
                </div>
                
              <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->