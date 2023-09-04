@extends('templete.index')
@section('content')
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
<div class="content">
    <div class="card sale">
        <div class="card-body">
            <h1>Venda</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="/sale/create">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Produto</label>
                    <input type="text" class="form-control" id="product" name="product" value="{{ isset($sale) ? data_get($sale, 'product', 0) : ''}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Valor</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="{{ isset($sale) ? data_get($sale, 'amount', 0) : ''}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Data</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ isset($sale) ? data_get($sale, 'date', 0) : ''}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Hora</label>
                    <input type="time" class="form-control" id="time" name="time" value="{{ isset($sale) ? data_get($sale, 'time', 0) : ''}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Latitude</label>
                    <input type="text" class="form-control" id="lat" name="lat" value="{{ isset($sale) ? data_get($sale, 'lat', 0) : ''}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Longitude</label>
                    <input type="text" class="form-control" id="lng" name="lng" value="{{ isset($sale) ? data_get($sale, 'lng', 0) : ''}}">
                </div>
                <button class="btn btn-primary button" type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <div  class="card map">
        <div class="card-body">
            <div id="map" class="map" style="width: auto; min-height: 300px;"></div>
        </div>
    </div>
</div>
<script>
   function initMap() {
        var mapOptions = {
            center: { lat: -34.397, lng: 150.644 }, // Coordenadas iniciais do mapa
            zoom: 8, // Nível de zoom inicial
        };
        var bounds = new google.maps.LatLngBounds();
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Dados dos marcadores
        var markersData = [
            {
                position: { lat: {{$sale->lat}}, lng: {{$sale->lng}} },
                title: '{{$sale->product}}',
                amount: {{$sale->amount}}
            },

        ];

        // Loop para criar e adicionar marcadores com janelas de informações
        for (var i = 0; i < markersData.length; i++) {
            var data = markersData[i];
            var marker = new google.maps.Marker({
                position: markersData[i].position,
                map: map,
                title: markersData[i].title
            });

            var infoWindow = new google.maps.InfoWindow({
                content: markersData[i].content
            });

            // Adicione um evento de clique para exibir a janela de informações quando o marcador for clicado
            (function (marker, data) {
            google.maps.event.addListener(marker, "click", function (e) {
                //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                infoWindow.setContent(`<div style='width:200px;min-height:40px'><h3> Produto: ` + data.title + `</h3></div>`);
                infoWindow.open(map, marker);
            });
            })(marker, data);
            bounds.extend(marker.position)
        }

        map.fitBounds(bounds);

    }
</script>
<style>
    .content {
        flex-direction: 'row';
        display: flex
    }
    .sale {
        flex: 1;
        margin: 40px
    }
    .map {
        flex: 1;
        margin: 40px
    }
    .button {
        width: 100%;
    }
</style>
@endsection()