<div class="uk-form-row">
    <label class="uk-form-label" for="name">Nama</label>
    <div class="uk-form-controls">
        {!! Form::text('name', null, array('class' => 'uk-form-large', 'placeholder' => 'Masukan nama')) !!}
    </div>
</div>

<div class="uk-form-row">
    <label class="uk-form-label" for="email">Email</label>
    <div class="uk-form-controls">
        {!! Form::text('email', null, array('class' => 'uk-form-large uk-form-width-large', 'placeholder' => 'Masukan email')) !!}
    </div>
</div>

<div class="uk-form-row">
    <label class="uk-form-label" for="password">Password</label>
    <div class="uk-form-controls">
        {!! Form::password('password', array('class' => 'uk-form-large', 'placeholder' => 'Masukan kata sandi', 'autocomplete' => 'off')) !!}
    </div>
</div>

<div class="uk-form-row">
    <label class="uk-form-label" for="password_confirmation">Ulangi kata sandi</label>
    <div class="uk-form-controls">
        {!! Form::password('password_confirmation', array('class' => 'uk-form-large', 'placeholder' => 'Ulangi kata sandi', 'autocomplete' => 'off')) !!}
    </div>
</div>

<div class="uk-form-row">
    <div class="uk-form-controls">
        {!! Form::button('Simpan', array('class' => 'uk-button uk-button-primary uk-button-large uk-border-rounded', 'type' => 'submit')) !!}
    </div>
</div>