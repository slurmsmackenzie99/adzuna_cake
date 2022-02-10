<div class="users form">
    <br>
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <br>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Wpisz nazwę użytkownika i hasło') ?></legend>
        <br>
        <div class="form-floating">
        <?= $this->Form->control('email', ['required' => true, 'class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'name@example.com', 'label' => ['floatingInput' => 'email']]) ?>
        </div>
        <div class="form-floating">
        <?= $this->Form->control('password', ['required' => true, 'class' => 'form-control', 'id' => 'floatingPassword', 'placeholder' => 'hasło']) ?>
        </div>
    </fieldset>
    <br>
    <?= $this->Form->submit(__('Zaloguj'), ['class' => 'btn btn-primary']); ?>
    <?= $this->Form->end() ?>
</div>

