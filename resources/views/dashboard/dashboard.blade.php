@extends('templete.index')
@section('content')
<h1>Dashboard</h1>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <div class="container filter" onload="loadData()">
        <form method="POST" action="dashboard">
            @csrf
            <div class="row">
                @if(Auth::user()->access === 'GD')
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Região</label>
                        <select onchange="getStores()" id="region_id" name="region_id" class="form-control form-control">
                            <option value="0">Selecione</option>
                            @foreach ($regions as $region)
                            <option value="{{$region->id}}">{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
                @if(Auth::user()->access === 'GD' || Auth::user()->access === 'RD')
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Loja</label>
                        <select id="store_id" name="store_id" class="form-control form-control">
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary button">Pesquisar</button>
                </div>
                @endif
                </div>
            </div>
        </form>
      <div id="map" class="map" style="width: 100%; min-height: 800px;"></div>
<style>
    .filter {
        padding: 20px;
        border-radius: 10px;
        border: solid 1px silver;
    }
    .button {
        margin-top: 25px;
    }
</style>
@endsection
@section('custom-js')
<script>

    @if(Auth::user()->access === 'RD')
        async function getStoresRD() {
            const sellers = await fetch(`/store/getStoreByRegion/{{Auth::user()->regionManager->region_id}}`)
            var data = await sellers.json();
            var select = document.getElementById("store_id");
            select.options[select.options.length] = new Option('Selecione', 0);
            for (let i = 0; i < data.length; i++) {
                select.options[select.options.length] = new Option(data[i].name, data[i].id);
            }
        }
        const data = (async()=> {
            getStoresRD();
        })

        data()
    @endif

    async function getStores() {
        document.getElementById('store_id').innerText = null;
        var regionId = document.getElementById("region_id").value;
        const stores = await fetch(`/store/getStoreByRegion/${regionId}`)
        var data = await stores.json();
        var select = document.getElementById("store_id");
        select.options[select.options.length] = new Option('Selecione', 0);
        for (let i = 0; i < data.length; i++) {
            select.options[select.options.length] = new Option(data[i].name, data[i].id);
        }
    }

    function initMap() {
        var mapOptions = {
            center: { lat: -34.397, lng: 150.644 }, // Coordenadas iniciais do mapa
            zoom: 8, // Nível de zoom inicial
        };
        var bounds = new google.maps.LatLngBounds();
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Dados dos marcadores
        var markersData = [
            @foreach ($stores as $store)
            {
                position: { lat: {{$store->lat}}, lng: {{$store->lng}} },
                title: '{{$store->name}}',
                content: '{{$store->name}}',
                amount: {{$store->amount}}
            },
            @endforeach

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

            if(markersData[i].amount > 0) {
                var center = new google.maps.LatLng(markersData[i].position.lat,  markersData[i].position.lng);
                var radius = markersData[i].amount * 10000; // Define o raio em metros

                var circle = new google.maps.Circle({
                    center: center,
                    radius: radius,
                    map: map,
                    fillColor: '#FF0000', // Cor de preenchimento do círculo
                    fillOpacity: 0.35, // Opacidade do preenchimento
                    strokeColor: '#FF0000', // Cor da borda
                    strokeOpacity: 0.8, // Opacidade da borda
                    strokeWeight: 2 // Largura da borda
                });
            }
            // Adicione um evento de clique para exibir a janela de informações quando o marcador for clicado
            (function (marker, data) {
            google.maps.event.addListener(marker, "click", function (e) {
                //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                infoWindow.setContent(`<div style='width:200px;min-height:40px'><h3>` + data.title + `</h3></div>`);
                infoWindow.open(map, marker);
            });
            })(marker, data);
            bounds.extend(marker.position)
        }

        map.fitBounds(bounds);

    }
</script>
@endsection
