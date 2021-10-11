<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

         <?php if($this->Identity->get('role') == 1){?> 
          <li class="nav-item">
             <a class="nav-link" href="<?= $this->Url->build('/users/index') ?>">
              <i class="icon-people menu-icon"></i>
              <span class="menu-title">Employee Management</span>
            </a> 
          </li>
        <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->Url->build('/companies/index') ?>">
              <i class="icon-notebook menu-icon"></i>
              <span class="menu-title">Company Management</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Item Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= $this->Url->build('/categories/index') ?>">Manage Category</a></li>
              </ul>
            </div>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= $this->Url->build('/productcatalogs/index') ?>">Manage Catalog</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->Url->build('/Categorymarkups/index') ?>">
              <i class="icon-menu menu-icon"></i>
              <span class="menu-title">Markup Management</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
        </ul>
      </nav>
       