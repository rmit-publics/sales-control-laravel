<h1>Login</h1>
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
<form method="POST" action="/login">
    @csrf
    <input type="text"  name="email"/>
    <input type="text"  name="password"/>
    <button type="submit">Enviar</button>
</form>