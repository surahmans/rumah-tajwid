<div class="col-xs-12 col-md-4">
    <h3>Temukan kami di sini:</h3>
    <div id="map" style="width: 100%; height: 250px;">

    </div>
    <div>
        <br/>
        <p>
            {!! $configs->address  !!}
        </p>
    </div>
</div>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
    var myLatlng = new google.maps.LatLng({{ $configs->maps  }});

    var myOptions = {
      zoom: 16,
      center: myLatlng
    };

    var map = new google.maps.Map(document.getElementById("map"), myOptions);

    var marker = new google.maps.Marker({
       position: myLatlng,
       map: map,
       title:"Rumah Tajwid"
    });
</script>