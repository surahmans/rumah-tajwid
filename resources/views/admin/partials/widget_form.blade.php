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

    {!! Form::model($widget, ['method' => 'PUT', 'action' => ['WidgetController@update', $widget->id], 'class' => 'uk-form uk-form-horizontal']) !!}

        <div class="uk-form-row">
            <label class="uk-form-label" for="head">Head</label>
            <div class="uk-form-controls uk-grid">
                <div class="uk-width-7-10">
                    {!! Form::textarea('head', null, array('class' => 'uk-form-large uk-width-1-1')) !!}
                </div>
                <div class="uk-width-3-10">
                    <p>Menyisipkan kode pada bagian head</p>
                </div>
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label" for="body">Body</label>
            <div class="uk-form-controls uk-grid">
                <div class="uk-width-7-10">
                    {!! Form::textarea('body', null, array('class' => 'uk-form-large uk-width-1-1')) !!}
                </div>
                <div class="uk-width-3-10">
                    <p>Menyisipkan kode pada bagian body</p>
                </div>
            </div>
        </div>


        <div class="uk-form-row">
            <label class="uk-form-label" for="top">Top of sidebar</label>
            <div class="uk-form-controls uk-grid">
                <div class="uk-width-7-10">
                    {!! Form::textarea('top', null, array('class' => 'uk-form-large uk-width-1-1')) !!}
                </div>
                <div class="uk-width-3-10">
                    <p>Posisinya berada di atas sidebar utama (Populer, terkini, komentar).</p>
                    <p>Format panel <a href="#format" data-uk-modal>di sini.</a></p>
                </div>
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label" for="bottom">Bottom of sidebar</label>
            <div class="uk-form-controls uk-grid">
                <div class="uk-width-7-10">
                    {!! Form::textarea('bottom', null, array('class' => 'uk-form-large uk-width-1-1')) !!}
                </div>
                <div class="uk-width-3-10">
                    <p>Posisinya berada di bawah sidebar utama (Populer, terkini, komentar).</p>
                    <p>Format panel <a href="#format" data-uk-modal>di sini.</a></p>
                </div>
            </div>
        </div>

        <div class="uk-form-row">
            <div class="uk-form-controls">
                {!! Form::button('Simpan', array('class' => 'uk-button uk-button-primary uk-button-large uk-form-width-large uk-border-rounded', 'type' => 'submit')) !!}
            </div>
        </div>

    {!! Form::close() !!}

    <!-- Modal for format panel -->
    <div class="uk-modal" id="format">
        <div class="uk-modal-dialog">
            <a href="#" class="uk-modal-close uk-close"></a>
            &lt;div class=&quot;panel panel-info&quot;&gt; <br/>
                &nbsp;&nbsp;&nbsp;&lt;div class=&quot;panel-heading&quot;&gt; <br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h3 class=&quot;panel-title text-center&quot;&gt;&lt;strong&gt;<b>Ketik judul panel di sini</b>&lt;/strong&gt;&lt;/h3&gt; <br/>
                &nbsp;&nbsp;&nbsp;&lt;/div&gt; <br/>
                &nbsp;&nbsp;&nbsp;&lt;div class=&quot;panel-body&quot;&gt; <br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;<b>Ketikan kode atau isinya di sini.</b>&lt;/p&gt; <br/>
                &nbsp;&nbsp;&nbsp;&lt;/div&gt; <br/>
            &lt;/div&gt; <br/>
        </div>
    </div>
    <!-- End of modal -->

</div>