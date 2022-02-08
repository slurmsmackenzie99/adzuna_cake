<h1>Wyszukiwanie ofert pracy</h1>

<?= $this->Form->create(); ?>
<!--//, ['type' => 'get']-->
<?= $this->Form->control('stanowisko', ['label' => 'Wpisz nazwę pozycji', 'placeholder' => 'np. mechanik', 'class' => 'form-control']); ?>
<br>
<?= $this->Form->control('lokalizacja', ['label' => 'Wpisz miasto', 'placeholder' => 'np. Warszawa', 'class' => 'form-control']); ?>
<br>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']); ?>
<?= $this->Form->end(); ?>

<br>
<?php
if ($this->request->is('post')) {
    for ($x = 0; $x < count($results); $x++) {
        if (isset($results[$x])) :
            $title = $results[$x]->title;
            $company_name = $results[$x]->company->display_name;
            $description = $results[$x]->description;
            $redirect_url = $results[$x]->redirect_url;
            $location = $results[$x]->location->display_name;
            $created = $results[$x]->created;
            $salary_min = $results[$x]->salary_min;
            $salary_max = $results[$x]->salary_max;
            ?>
            <div class="card mb-3">
                <h3 class="card-header"><a href="<?php echo $redirect_url ?>"><?= $title; ?></a></h3>
                <div class="card-body">
                    <h5 class="card-title"><?= $company_name; ?></h5>
                    <h6 class="card-subtitle text-muted">Lokalizacja: <?= $location; ?></h6>
                </div>
<!--                <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200"-->
<!--                     aria-label="Placeholder: Image cap" focusable="false" role="img"-->
<!--                     preserveAspectRatio="xMidYMid slice"-->
<!--                     viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">-->
<!--                    <rect width="100%" height="100%" fill="#868e96"></rect>-->
<!--                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>-->
<!--                </svg>-->
                <div class="card-body">
                    <p class="card-text"><?= $description; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Zarobki od <?= $salary_min ?>zł do <?= $salary_max ?>zł rocznie</li>
                    <!--                <li class="list-group-item">Dapibus ac facilisis in</li>-->
                    <!--                <li class="list-group-item">Vestibulum at eros</li>-->
                </ul>
                <div class="card-body">
                    <a href="<?php echo $redirect_url ?>" class="card-link">Kliknij tutaj aby zobaczyć ofertę</a>
                    <!--                <a href="#" class="card-link">Another link</a>-->
                </div>
                <div class="card-footer text-muted">
                    Dodane: <?= $created; ?>
                </div>
            </div>
        <?php endif;
    }
}
?>
