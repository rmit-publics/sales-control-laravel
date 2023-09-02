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
    <select name="product_id">
        <option value="1">Teste</option>
    </select>
    <input type="number"  name="quantity"/>
    <input type="number"  name="lat"/>
    <input type="number"  name="lng"/>
    <button type="submit">Enviar</button>
</form>