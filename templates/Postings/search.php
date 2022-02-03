<h1>Wyszukiwanie ofert pracy</h1>
<?php debug($appId);
debug($appKey);
debug($baseURL);
?>
<?= $this->Form->create($posting); ?>
    <fieldset>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Stanowisko</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="(np. mechanik)">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Lokalizacja</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="(np. Warszawa)">
        </div>
        <button type="submit" class="btn btn-primary">Szukaj</button>

    </fieldset>
    <?= $this->Form->end(); ?>

