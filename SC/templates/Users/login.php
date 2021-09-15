
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
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <!-- <form class="pt-3"> -->
              <?= $this->Form->create() ?>  
                <div class="form-group">
                  
                  <?= $this->Form->control('email', ['label' => false,'required' => true,'class' => 'form-control form-control-lg', 'placeholder' => 'Username']) ?>
                </div>
                <div class="form-group">
                  
                  <?= $this->Form->control('password', ['label' => false,'required' => true,'class'=>'form-control form-control-lg','placeholder'=>'Password']) ?>
                </div>
                <div class="mt-3">
                  <?= $this->Form->submit(__('SIGN IN'),['class' => 'btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn']); ?>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
              <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
