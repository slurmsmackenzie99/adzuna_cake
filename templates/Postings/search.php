<h1>Wyszukiwanie ofert pracy</h1>

<?= $this->Form->create(); ?>
<!--//, ['type' => 'get']-->
<?= $this->Form->control('stanowisko', ['label' => 'Wpisz nazwę pozycji', 'placeholder' => 'np. mechanik', 'class'=>'form-control']); ?>
<?= $this->Form->control('lokalizacja', ['label' => 'Wpisz miasto', 'placeholder' => 'np. Warszawa', 'class'=>'form-control']); ?>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end(); ?>

<div>
    <?php ?>
    <?php debug($json); ?>
</div>
