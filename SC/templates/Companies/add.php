<h1>Add New Company</h1>
<?php 

echo $this->Form->create($company);
echo $this->Form->control('user_id',['type'=>'hidden','value'=>1]);
echo $this->Form->control('company_name');
echo $this->Form->control('email');
echo $this->Form->control('contact_no');
echo $this->Form->control('city');
echo $this->Form->control('country');
echo $this->Form->control('state');
echo $this->Form->control('postal_code');
$status = [1 =>'Active', 0 =>'Block'];
echo $this->Form->select('status', $status,  ['empty' => '(choose one)']);
//echo $this->Form->control('status',['type'=>'select', 'options' => $status]);
echo $this->Form->button('Save Company');
echo $this->Form->end();

?>