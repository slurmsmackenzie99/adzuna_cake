<h1><?= h($posting->title) ?></h1>
<p><?= h($posting->body) ?></p>
<p><small>Created: <?= $posting->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $posting->slug]) ?></p>
