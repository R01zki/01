@section('content')
<script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.19.0.min.js"></script>
<link rel="stylesheet" href="{{asset('vendors/css/style.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="bg"></div>
<div class="bg-others">
    <div class="container">
        <h1>Realtime GPS Tracker</h1>
        <center>
            <hr style="height:2px; border:none; color:#ffffff; background-color:#ffffff; width:35%; margin: 0 auto 0 auto;">
        </center>

        <center><button class="btn btn-success col-sm-3" id="action">Start Tracking</button></center><br>
        <center>
            <div id="map-canvas"></div>
        </center>
    </div>
</div>

<script>
    window.lat = -6.9717448;
    window.lng = 107.650587;

    var map;
    var mark;
    var lineCoords = [];

    var initialize = function() {
        map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: lat,
                lng: lng
            },
            zoom: 12
        });
        mark = new google.maps.Marker({
            position: {
                lat: lat,
                lng: lng
            },
            map: map
        });
    };

    window.initialize = initialize;

    var redraw = function(payload) {
        if (payload.message.lat) {
            lat = payload.message.lat;
            lng = payload.message.lng;

            map.setCenter({
                lat: lat,
                lng: lng,
                alt: 0
            });
            mark.setPosition({
                lat: lat,
                lng: lng,
                alt: 0
            });

            lineCoords.push(new google.maps.LatLng(lat, lng));

            var lineCoordinatesPath = new google.maps.Polyline({
                path: lineCoords,
                geodesic: true,
                strokeColor: '#2E10FF'
            });

            lineCoordinatesPath.setMap(map);
        }
    };

    var pnChannel = "raspi-tracker";

    var pubnub = new PubNub({
        publishKey: 'pub-c-279b2a00-fa1a-4d98-85a4-0e57fe4b775a',
        subscribeKey: 'sub-c-129719a6-53f7-11ea-80a4-42690e175160'
    });

    document.querySelector('#action').addEventListener('click', function() {
        var text = document.getElementById("action").textContent;
        if (text == "Start Tracking") {
            pubnub.subscribe({
                channels: [pnChannel]
            });
            pubnub.addListener({
                message: redraw
            });
            document.getElementById("action").classList.add('btn-danger');
            document.getElementById("action").classList.remove('btn-success');
            document.getElementById("action").textContent = 'Stop Tracking';
        } else {
            pubnub.unsubscribe({
                channels: [pnChannel]
            });
            document.getElementById("action").classList.remove('btn-danger');
            document.getElementById("action").classList.add('btn-success');
            document.getElementById("action").textContent = 'Start Tracking';
        }
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBss8Git7DeOkE7Ww9ln9lPCivyYHzbsmM&callback=initialize"></script>
<script>
    function newPoint(time) {
        var radius = 0.01;
        var x = Math.random() * radius;
        var y = Math.random() * radius;
        return {
            lat: window.lat + y,
            lng: window.lng + x
        };
    }
    setInterval(function() {
        pubnub.publish({
            channel: pnChannel,
            message: newPoint()
        });
    }, 500);
</script>
@endsection