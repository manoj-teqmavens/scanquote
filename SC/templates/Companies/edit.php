<h1>Edit Company </h1>
<?php 
    echo $this->Form->create($company);
    echo $this->Form->control('user_id',['type'=> 'hidden','value' => 1]);
    echo $this->Form->control('company_name');
    echo $this->Form->control('email');
    echo $this->Form->control('contact_no');
    echo $this->Form->control('city');
    echo $this->Form->control('country');
    echo $this->Form->control('state');
    echo $this->Form->control('postal_code');
    $status = [0=>'Block', 1=>'Active'];
    echo $this->Form->select('status',$status,['label' => 'Status']);
    //echo $this->Form->control('status');
    echo $this->Form->button('Save Company');
    echo $this->Form->end();

?>