<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>.: REDBELT :.</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descricao</th>
            <th>Criticidade</th>
            <th>Tipo</th>
            <th>Status</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($incidentes as $incidente)
            <tr>
                <td>{{$incidente['id']}}</td>
                <td>{{$incidente['titulo']}}</td>
                <td>{{$incidente['descricao']}}</td>
                <td>{{$criticidades[$incidente['criticidade']]}}</td>
                <td>{{$tipos[$incidente['tipo']]}}</td>
                <td>{{$status[$incidente['status']]}}</td>
                <td><a href="{{action('IncidenteController@edit', $incidente['id'])}}" class="btn btn-warning">Editar</a></td>
                <td>
                    <form action="{{action('IncidenteController@destroy', $incidente['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>