<!-- <h1><? //$companie->company_name?></h1>
<p><? //$companie->email?></p>
<p><small>Created: <? //$companie->created->format(DATE_RFC850)?></small></p>
<P><? //$this->Html->link('Edit', ['action' => 'edit', $companie->slug]); ?></P> -->


<div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['controller' => 'companies', 'action' => 'index']); ?>">Company Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Company Detail</span></li>
                      </ol>
                    </nav>
                </div>  
              </div>
              </div>  
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                  </p>
                  <?= $this->Html->link(__('List Companies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>   
                  <?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $companie->id], ['class' => 'side-nav-item']) ?>
                    <div class="form-group">
                        <?= __('Name:: ') ?>
                      <?= h($companie->company_name) ?>
                    </div>
                    <div class="form-group">
                      <?= __('Email ID: ') ?>
                      <?= h($companie->email) ?>
                    </div>
                    <div class="form-group">
                      <?= __('Contact Number: ') ?>
                      <?= h($companie->contact_no) ?>
                    </div>

                    <div class="form-group">
                      <?= __('Status: ') ?>
                      <?= isset($companie->status)?"Active":"Block" ?>
                    </div>
                    <div class="form-group">
                      <?= __('Created: ') ?>
                      <?= h($companie->created) ?>
                    </div>
                </div>
              </div>
            </div>