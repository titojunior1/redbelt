<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>.: REDBELT :.</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <h2>Criar um Incidente</h2><br  />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <form method="post" action="{{url('incidentes')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="titulo">Titulo:</label>
                <input type="text" class="form-control" name="titulo">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="descricao">Descricao:</label>
                <input type="text" class="form-control" name="descricao">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="criticidade">Criticidade:</label>
                <select class="form-control" name="criticidade">
                    <option value="1">Alta</option>
                    <option value="2">Media</option>
                    <option value="3">Baixa</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="tipo">Tipo:</label>
                <select class="form-control" name="tipo">
                    <option value="1">Ataque Brute Force</option>
                    <option value="2">Credencias vazadas</option>
                    <option value="3">Ataque de DDoS</option>
                    <option value="4">Atividades anormais de usuarios</option>
                </select>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success" style="margin-left:38px">Criar</button>
    </div>
</div>
</form>
</div>
</body>
</html>
