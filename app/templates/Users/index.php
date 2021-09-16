<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">

<h3><?= __('Users') ?></h3>
<h6>Loggin as <span><?= $this->Identity->get('username');?></span></h6>

     <?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'button float-left']) ?>
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                   <!--  <th><?= $this->Paginator->sort('password') ?></th> -->
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->email) ?></td>
                   <!--  <td><?= h($user->password) ?></td> -->
                    <td><?= h($user->role) ?></td>
                     <td><?php if ($user->status == 1) : ?>
    <?= $this->Form->postLink(__('Deactivate'), ['action' => 'userStatus', $user->id, $user->status], ['block' => true, 'confirm' => __('Are you sure you want to deactivate # {0}?', $user->id), 'class' => 'button', 'escape' => false, 'title'=>'Deactivate Account']) ?>
<?php else : ?>
    <?= $this->Form->postLink(__('Activate'), ['action' => 'userStatus', $user->id, $user->status], ['block' => true, 'confirm' => __('Are you sure you want to activate # {0}?', $user->id), 'class' => 'button', 'escape' => false, 'title'=>'Activate Account']) ?>
<?php endif; ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>