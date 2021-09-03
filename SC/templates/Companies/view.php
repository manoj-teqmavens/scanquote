<h1><?= $companie->company_name?></h1>
<p><?= $companie->email?></p>
<p><small>Created: <?= $companie->created->format(DATE_RFC850)?></small></p>
<P><?= $this->Html->link('Edit', ['action' => 'edit', $companie->slug]); ?></P>