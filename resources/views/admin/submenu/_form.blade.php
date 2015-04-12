<div class="uk-form-row">
    <label class="uk-form-label" for="name">Nama Menu</label>
    <div class="uk-form-controls">
        {!! Form::text('name', null, array('class' => 'uk-form-large', 'placeholder' => 'Masukan nama menu')) !!}
    </div>
</div>

<div class="uk-form-row">
    <label class="uk-form-label" for="page">Link / Page</label>
    <div class="uk-form-controls">
        {!! Form::text('page', null, array('class' => 'uk-form-large uk-form-width-large', 'placeholder' => 'Masukan linknya')) !!}
    </div>
</div>

<div class="uk-form-row">
    <label class="uk-form-label" for="page">Parent Menu</label>
    <div class="uk-form-controls">
        {!! Form::select('parent_id', $parentIds, array('class' => 'uk-form-large uk-form-width-large')) !!}
    </div>
</div>

<div class="uk-form-row">
    <div class="uk-form-controls">
        {!! Form::button('Simpan', array('class' => 'uk-button uk-button-primary uk-button-large uk-border-rounded', 'type' => 'submit')) !!}
    </div>
</div>