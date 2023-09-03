@extends('templete.index')
@section('content')
<h1>Dashboard</h1>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <div class="container filter" onload="loadData()">
        <div class="row">
            @if(Auth::user()->access === 'GD')
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Região</label>
                    <select onchange="getStores()" id="region_id" name="region_id" class="form-control form-control">
                        @foreach ($regions as $region)
                        <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            @if(Auth::user()->access === 'GD' || Auth::user()->access === 'RD')
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Loja</label>
                    <select onchange="getSellers()" id="store_id" name="store_id" class="form-control form-control">
                        @foreach ($stores as $store)
                        <option value="{{$store->id}}">{{$store->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Vendedor</label>
                    <select id="seller_id" name="seller_id" class="form-control form-control">

                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary button">Pesquisar</button>
            </div>
            @endif
            </div>
        </div>
      <div id="map" style="width: 100%; height: 400px;"></div>
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

    window.onload = getSellers();

    async function getStores() {
        document.getElementById('store_id').innerText = null;
        var regionIdd = document.getElementById("region_id").value;
        const sellers = await fetch(`/store/getStoreByRegion/${regionIdd}`)
        var data = await sellers.json();
        for (let i = 0; i < data.length; i++) {
            var select = document.getElementById("store_id");
            select.options[select.options.length] = new Option(data[i].name, data[i].id);
        }
        getSellers()
    }

    async function getSellers() {
        document.getElementById('seller_id').innerText = null;
        var storeId = document.getElementById("store_id").value;
        const sellers = await fetch(`/user/getSellers/${storeId}`)
        var data = await sellers.json();
        for (let i = 0; i < data.length; i++) {
            var select = document.getElementById("seller_id");
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
                marker.addListener('click', function () {
                    infoWindow.open(map, this);
                });
                bounds.extend(marker.position)
            }

            map.fitBounds(bounds);

        }
</script>
@endsection
