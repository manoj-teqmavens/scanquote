<h1>Companies list</h1>
<h3><?= $this->Html->link('Add New Company',['action' => 'add'])?></h3>
<table>
<thead>
<tr><th>Title</th>
<th>Email</th>
<th>Contact no</th>
<th>Created</th>
<th>Action</th></tr>
</thead>
<tbody>
<?php foreach ($companies as $companie) : ?>
<tr>
<td><?= $this->Html->link($companie->company_name,['action' => 'view', $companie->slug]); ?></td>
<td><?= $companie->email;?></td>
<td><?= $companie->contact_no;?></td>
<td><?= $companie->created->format(DATE_RFC850);?></td>
<td><?= $this->Html->link('Edit',['action' => 'edit', $companie->slug]); ?></td>
<td><?= $this->Form->postLink(
    'Delete',
    ['action' => 'delete',  $companie->slug],
    ['confirm' => 'Are You sure?']
); ?></td>
</tr>    
<?php  endforeach; ?>
</tbody>
</table>