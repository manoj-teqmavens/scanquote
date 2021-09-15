<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
             <a class="nav-link" href="<?= $this->Url->build('/users/index') ?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Employee Management</span>
            </a> 
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->Url->build('/companies/index') ?>">
              <i class="icon-cog menu-icon"></i>
              <span class="menu-title">Company Management</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Markup Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Add New Company</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
              <i class="icon-image menu-icon"></i>
              <span class="menu-title">Item Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Manage Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Manage Catalog</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
       