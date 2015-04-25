<div class="uk-form-row">
    <label class="uk-form-label" for="title">Judul</label>
    <div class="uk-form-controls">
        {!! Form::text('title', null, array('class' => 'uk-form-large uk-width-1-1')) !!}
    </div>
</div>

<div class="uk-form-row">
    <label class="uk-form-label" for="body">Isi</label>
    <div class="uk-form-controls">
        {!! Form::textarea('body', null, array('class' => 'uk-form-large uk-width-1-1', 'id' => 'editor1')) !!}
    </div>
</div>

<div class="uk-form-row">
    <div class="uk-form-controls">
        {!! Form::button('Simpan', array('class' => 'uk-button uk-button-primary uk-button-large uk-border-rounded uk-width-1-1', 'type' => 'submit')) !!}
    </div>
</div>