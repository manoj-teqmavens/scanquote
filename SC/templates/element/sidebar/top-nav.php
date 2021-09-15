<!-- <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<? //$this->Url->build('/') ?>"><span>Scan</span>Quote</a>
        </div>
        <div class="top-nav-links">
        <?php //if($this->Identity->get('username')){?>
        <? //$this->Html->link('Logout',['controller'=>'users','action' => 'logout'])?>
        <?php //} ?>
            <a target="_blank" rel="noopener" href=""></a>
            <a target="_blank" rel="noopener" href=""></a>
        </div>
    </nav> -->


 <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-5" href="<?= $this->Url->build('/') ?>"><?= $this->Html->image('logo.svg', ['alt' => 'logo','class' => 'me-2'])?></a>
        <a class="navbar-brand brand-logo-mini" href="<?= $this->Url->build('/') ?>">
            <?= $this->Html->image('logo-mini.svg', ['alt' => 'logo'])?></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              
              
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="../../../../images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="<?= $this->Url->build('/users/logout') ?>">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav> 
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      
      