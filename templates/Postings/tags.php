<h1>
    Oferty pracy otagowane:
    <?= $this->Text->toList(h($tags), 'or') ?>
</h1>

<section>
    <?php foreach ($postings as $posting): ?>
        <article>
            <!-- Use the HtmlHelper to create a link -->
            <h4><?= $this->Html->link(
                    $posting->title,
                    ['controller' => 'Postings', 'action' => 'view', $posting->slug]
                ) ?></h4>
            <span><?= h($posting->created) ?></span>
        </article>
    <?php endforeach; ?>
</section>
