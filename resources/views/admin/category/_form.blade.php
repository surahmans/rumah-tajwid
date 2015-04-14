<div class="uk-form-row">
    <label class="uk-form-label" for="name">Nama Kategori</label>
    <div class="uk-form-controls">
        {!! Form::text('name', null, array('class' => 'uk-form-large', 'placeholder' => 'Masukan nama kategori')) !!}
    </div>
</div>

<div class="uk-form-row">
    <div class="uk-form-controls">
        {!! Form::button('Simpan', array('class' => 'uk-button uk-button-primary uk-button-large uk-border-rounded', 'type' => 'submit')) !!}
    </div>
</div>