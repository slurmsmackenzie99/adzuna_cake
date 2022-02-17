<br>
<h1>Wyszukiwanie ofert pracy</h1>

<?= $this->Form->create(); ?>
<!--//, ['type' => 'get']-->
<?= $this->Form->control('stanowisko', ['label' => 'Wpisz nazwę pozycji', 'placeholder' => 'np. mechanik', 'class' => 'form-control']); ?>
<br>
<?php
$options = [
    ['text' => 'dolnoslaskie', 'value' => 'dolnoslaskie'],
    ['text' => 'kujawsko-pomorskie', 'value' => 'kujawsko-pomorskie'],
    ['text' => 'lubelskie', 'value' => 'lubelskie'],
    ['text' => 'lubuskie', 'value' => 'lubuskie'],
    ['text' => 'lodzkie', 'value' => 'lodzkie'],
    ['text' => 'malopolskie', 'value' => 'malopolskie'],
    ['text' => 'mazowieckie', 'value' => 'mazowieckie'],
    ['text' => 'opolskie', 'value' => 'opolskie'],
    ['text' => 'podkarpackie', 'value' => 'podkarpackie'],
    ['text' => 'podlaskie', 'value' => 'podlaskie'],
    ['text' => 'pomorskie', 'value' => 'pomorskie'],
    ['text' => 'slaskie', 'value' => 'slaskie'],
    ['text' => 'swietokrzyskie', 'value' => 'swietokrzyskie'],
    ['text' => 'warminsko-mazurskie', 'value' => 'warminsko-mazurskie'],
    ['text' => 'wielkopolskie', 'value' => 'wielkopolskie'],
    ['text' => 'zachodniopomorskie', 'value' => 'zachodniopomorskie'],
];
?>

<?= $this->Form->label('Województwo') ?>
<?= $this->Form->select('wojewodztwo', $options,
    ['class' => 'form-select']) ?>
<br>
<?= $this->Form->control('lokalizacja', ['label' => 'Wpisz miasto', 'placeholder' => 'np. Warszawa', 'class' => 'form-control']); ?>
<br>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']); ?>
<?= $this->Form->end(); ?>

<br>
<?php
if ($this->request->is('post')) {
    foreach ($results as $result) {
            $title = $result->title;
            $company_name = $result->company->display_name;
            $description = $result->description;
            $redirect_url = $result->redirect_url;
            $location = $result->location->display_name;
            $created = $result->created;
            $salary_min = $result->salary_min?? '"Niedostępne" ';
            $salary_max = $result->salary_max?? '"Niedostępne" ';
            $salary_predicted = $result->salary_is_predicted;
            ?>
            <div class="card mb-3">
                <h3 class="card-header"><a href="<?php echo $redirect_url ?>"><?= $title; ?></a></h3>
                <div class="card-body">
                    <h5 class="card-title"><?= $company_name; ?></h5>
                    <h6 class="card-subtitle text-muted">Lokalizacja: <?= $location; ?></h6>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $description; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Zarobki od <?= $salary_min ?>zł do <?= $salary_max ?>zł rocznie
                    </li>
                </ul>
                <div class="card-body">
                    <a href="<?php echo $redirect_url ?>" class="card-link">Kliknij tutaj aby zobaczyć ofertę</a>
                </div>
                <div class="card-footer text-muted">
                    Dodane: <?= date("d/m/Y H:i A", strtotime($created)) ?>
                </div>
            </div>
        <?php
    }
}
?>
