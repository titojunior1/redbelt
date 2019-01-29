<?php
namespace App\Http\Controllers;
use App\Http\Requests\IncidenteRequest;
use App\Incidente;
class IncidenteController extends Controller
{
    public function index()
    {
        $incidentes = Incidente::orderBy('created_at', 'desc')->paginate(10);
        $criticidades['1'] = 'Alta';
        $criticidades['2'] = 'Media';
        $criticidades['3'] = 'Baixa';
        $tipos['1']        = 'Ataque Brute Force';
        $tipos['2']        = 'Credencias vazadas';
        $tipos['3']        = 'Ataque de DDoS';
        $tipos['4']        = 'Atividades anormais de usuarios';
        $status['0']       = 'Aberto';
        $status['1']       = 'Fechado';
        return view('incidentes.index',['incidentes' => $incidentes, 'criticidades' => $criticidades, 'tipos' => $tipos, 'status' => $status]);
    }

    public function create()
    {
        return view('incidentes.create');
    }

    public function store(IncidenteRequest $request)
    {
        $incidente = $this->validate(request(), [
            'titulo' => 'required',
            'descricao' => 'required',
            'criticidade' => 'required',
            'tipo' => 'required'
        ]);
        $incidente = new Incidente;
        $incidente->titulo      = $request->titulo;
        $incidente->descricao   = $request->descricao;
        $incidente->criticidade = $request->criticidade;
        $incidente->tipo        = $request->tipo;
        $incidente->status      = 0;//Status 0 = aberto
        $incidente->save();
        return redirect()->route('incidentes.index')->with('message', 'Incidente criado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $incidente = Incidente::findOrFail($id);
        $criticidades['1'] = 'Alta';
        $criticidades['2'] = 'Media';
        $criticidades['3'] = 'Baixa';
        $tipos['1']        = 'Ataque Brute Force';
        $tipos['2']        = 'Credencias vazadas';
        $tipos['3']        = 'Ataque de DDoS';
        $tipos['4']        = 'Atividades anormais de usuarios';
        return view('incidentes.edit',compact('incidente','id', 'criticidades', 'tipos'));
    }

    public function update(IncidenteRequest $request, $id)
    {
        $incidente = $this->validate(request(), [
            'titulo' => 'required',
            'descricao' => 'required',
            'criticidade' => 'required',
            'tipo' => 'required'
        ]);
        $incidente = new Incidente;
        $incidente = Incidente::findOrFail($id);
        $incidente->titulo       = $request->titulo;
        $incidente->descricao    = $request->descricao;
        $incidente->criticidade  = $request->criticidade;
        $incidente->tipo         = $request->tipo;
        $incidente->status       = $request->status;
        $incidente->save();
        return redirect()->route('incidentes.index')->with('message', 'Incidente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $incidente = Incidente::findOrFail($id);
        $incidente->delete();
        return redirect()->route('incidentes.index')->with('alert-success','Incidente foi excluído!');
    }
}