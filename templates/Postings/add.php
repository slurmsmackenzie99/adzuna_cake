<h1>Dodaj ofertę pracy</h1>
<?php
echo $this->Form->create($posting);
//echo $this->Form->control('user_id', ['type'=>'int']);
echo $this->Form->control('title');
echo $this->Form->control('body', ['rows' => '3']);
echo $this->Form->control('tags_string', ['type' => 'text']);
echo $this->Form->button(__('Zapisz ofertę', ['class' => 'btn btn-primary']));
echo $this->Form->end();
