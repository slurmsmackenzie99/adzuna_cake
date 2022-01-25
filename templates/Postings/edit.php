<h1>Edytuj ofertę</h1>
<?php
    echo $this->Form->create($posting);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->button(__('Zapisz'));
    echo $this->Form->end();
?>
