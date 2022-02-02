<h1>Szukaj ofert pracy</h1>
<div class="search-bar">
    echo $this->Form->create($search);
    echo $this->Form->control('location' ['options']);
    echo $this->Form->control('job_title');
    echo $this->Form->button(__('Szukaj'));
    echo $this->Form->end();
</div>
