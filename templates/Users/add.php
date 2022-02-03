<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend>Zarejestruj się</legend>

        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleSelect2" class="form-label mt-4">Czy jesteś pracownikiem czy pracodawcą?</label>
            <select multiple="" class="form-select" id="exampleSelect2">
                <option>Jestem pracownikiem</option>
                <option>Jestem pracodawcą</option>
            </select>
        </div>
        <div class="form-group">
            <label for="formFile" class="form-label mt-4">CV</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <fieldset class="form-group">
            <legend class="mt-4">Checkboxes</legend>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Default checkbox
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
                <label class="form-check-label" for="flexCheckChecked">
                    Checked checkbox
                </label>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
<?= $this->Form->end() ?>
