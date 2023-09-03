@extends('templete.index')
@section('content')
<div class="card">
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
                <input type="text" class="form-control" id="product" name="product">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Quantia</label>
                <input type="number" class="form-control" id="quantity" name="quantity">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Latitude</label>
                <input type="text" class="form-control" id="lat" name="lat">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Longitude</label>
                <input type="text" class="form-control" id="lng" name="lng">
            </div>
            <button class="btn btn-primary button" type="submit">Enviar</button>
        </form>
    </div>
</div>

<style>
    .card {
        min-width: 400px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: solid 1px silver;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 2px 2px rgb(143, 143, 142);
    }
    .button {
        width: 100%;
    }
</style>
@endsection()