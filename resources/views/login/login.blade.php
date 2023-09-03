<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sales Control</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  </head>
  <body>
    <div class="login">
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
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                <input placeholder="E-mail" class="form-control" type="text" name="email"/>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Senha</label>
                <input placeholder="Senha" class="form-control"  type="password" name="password"/>
            </div>
            <button class="btn btn-primary button" type="submit">Login</button>
        </form>
    </div>
</body>
</html>

<style>
    .login {
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