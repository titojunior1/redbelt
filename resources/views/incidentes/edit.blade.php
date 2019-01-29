<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>.: REDBELT :.</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <h2>Editar um Incidente</h2><br  />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <form method="post" action="{{action('IncidenteController@update', $id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="titulo">Titulo:</label>
                <input type="text" class="form-control" name="titulo" value="{{$incidente->titulo}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="descricao">Descricao:</label>
                <input type="text" class="form-control" name="descricao" value="{{$incidente->descricao}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="criticidade">Criticidade:</label>
                <select class="form-control" name="criticidade">
                    @foreach($criticidades as $i => $criticidade)
                        <option value="{{$i}}" {{($i == $incidente->criticidade ? 'selected' : '')}}>{{$criticidade}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="tipo">Tipo:</label>
                <select class="form-control" name="tipo">
                    @foreach($tipos as $i => $tipo)
                        <option value="{{$i}}" {{($i == $incidente->tipo ? 'selected' : '')}}>{{$tipo}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="0">Aberto</option>
                    <option value="1">Fechado</option>
                </select>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success" style="margin-left:38px">Atualizar Incidente</button>
    </div>
</div>
</form>
</div>
</body>