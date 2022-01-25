<h1>Oferty pracy</h1>
<?= $this->Html->link('Dodaj ofertę', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Tytuł</th>
        <th>Data dodania</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($postings as $posting): ?>
        <tr>
            <td>
                <?= $this->Html->link($posting->title, ['action' => 'view', $posting->slug]) ?>
            </td>
            <td>
                <?= $posting->created->format(DATE_RFC850) ?>
            </td>
            <td>
                <?= $this->Html->link('Edytuj', ['action' => 'edit', $posting->slug]) ?>
                <?= $this->Form->postLink(
                    'Usuń',
                    ['action' => 'delete', $posting->slug],
                    ['confirm' => 'Jesteś pewny?'])
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
