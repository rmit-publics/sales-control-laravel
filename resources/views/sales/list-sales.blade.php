@extends('templete.index')
@section('content')
<div class="card">
    <div class="card-body">
        <h1>Lista de Vendas</h1>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="/sales">
                    @csrf
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Data de Início</label>
                                <input type="date" class="form-control" id="date_ini" name="date_ini">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Data Final</label>
                                <input type="date" class="form-control" id="date_end" name="date_end">
                            </div>
                        </div>
                        @if(Auth::user()->access !== 'S')
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gerente</label>
                                <select onchange="getStores()" id="manager_id" name="manager_id" class="form-control form-control">
                                    @foreach ($managers as $manager)
                                    <option value="{{$manager->id}}">{{$manager->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loja</label>
                                <select onchange="getStores()" id="store_id" name="store_id" class="form-control form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vendedor</label>
                                <select id="seller_id" name="seller_id" class="form-control form-control">

                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary button">Pesquisar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="right">
            <a href="/sale/create" type="button" class="btn btn-primary">Nova Venda</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sales as $sale)
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger">Deletar</button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<style>
    .card {
        margin: 10px;
    }
    .right {
        float: right;
    }
    .button {
        margin-top: 25px;
    }
</style>
@endsection()
@section('custom-js')
<script>

    window.onload = getStores();
    async function getStores() {
        document.getElementById('store_id').innerText = null;
        var regionIdd = document.getElementById("manager_id").value;
        const sellers = await fetch(`/store/getStoreByManager/${regionIdd}`)
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


</script>
@endsection()