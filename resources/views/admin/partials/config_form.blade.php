@if($errors->any())
    <div class="uk-alert uk-alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-border-rounded">

    {!! Form::model($config, ['method' => 'PUT', 'action' => ['ConfigurationController@update', $config->id], 'class' => 'uk-form uk-form-horizontal']) !!}

        <div class="uk-form-row">
            <label class="uk-form-label" for="category">Kategori</label>
            <div class="uk-form-controls">
                {!! Form::number('category', null, array('class' => 'uk-form-large uk-form-width-mini')) !!} Artikel per kategori. <br/>
                {!! Form::text('viewall', null, array('class' => 'uk-form-large')) !!} (Tombol lihat seluruh artikel per kategori)
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label" for="readmore">Artikel</label>
            <div class="uk-form-controls">
                {!! Form::number('perpage', null, array('class' => 'uk-form-large uk-form-width-mini')) !!} Artikel per halaman.<br/>
                {!! Form::text('readmore', null, array('class' => 'uk-form-large')) !!} (Tombol readmore artikel)
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label" for="maps">Koordinat maps</label>
            <div class="uk-form-controls">
                {!! Form::text('maps', null, array('class' => 'uk-form-large')) !!} (Latitude, Longitude) Dapatkan koordinat <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">di sini.</a> <br/>
                <p>Pastikan Anda memisahkan latitude dan longitude dengan tanda ',' (Koma).</p>
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label" for="facebook">Alamat fans page FB</label>
            <div class="uk-form-controls">
                {!! Form::text('facebook', null, array('class' => 'uk-form-large uk-width-1-1')) !!}
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label" for="address">Username twitter</label>
            <div class="uk-form-controls">
                {!! Form::text('twitter', null, array('class' => 'uk-form-large')) !!} Pastikan tidak menggunakan simbol @ (contoh: rumah_tajwid)
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label" for="adress">Alamat kantor</label>
            <div class="uk-form-controls">
                {!! Form::textarea('address', null, array('class' => 'uk-form-large')) !!}
            </div>
        </div>

        <div class="uk-form-row">
            <div class="uk-form-controls">
                {!! Form::button('Simpan', array('class' => 'uk-button uk-button-primary uk-button-large uk-form-width-large uk-border-rounded', 'type' => 'submit')) !!}
            </div>
        </div>

    {!! Form::close() !!}

</div>