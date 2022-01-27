<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Wpisz nazwę użytkownika lub hasło') ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Zaloguj')); ?>
    <?= $this->Form->end() ?>

    <?= $this->Html->link("Zarejestruj się", ['action' => 'add']) ?>
</div><?php
