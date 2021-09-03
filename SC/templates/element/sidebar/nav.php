<?= $this->Html->link(__('Employee Management'), ['action' => 'index',1], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Company Management'), ['controller' => 'companies','action' => 'index', 1], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Markup Management'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Item Management'), ['action' => ''], ['class' => 'side-nav-item']) ?>
       