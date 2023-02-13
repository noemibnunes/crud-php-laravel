<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Enums\StatusEnum;
use App\Enums\SexoEnum;

class PessoaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.index', compact('pessoas')); // -> .../index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoas.create'); // -> .../create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validarDados = $request->validate([
            'nome'=>'required',
            'idade'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',       // verificar se eh um numero valido 
            'sexo' => 'required',
            'email'=>'required|email',
            'cargo'=>'required',
            'telefone'=>'required'
        ]);

        $pessoa = Pessoa::create($validarDados);
        return redirect('/pessoas')->with('success', 'Funcionário(a) adicionado com sucesso!'); // -> .../index.blade.php
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoas = Pessoa::findOrFail($id);
        return view('pessoas.show',compact('pessoas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        @$pessoas = Pessoa::findOrFail($id);
        return view('pessoas.edit',compact('pessoas')); // -> .../edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validarDados = $request->validate([
            'nome'=>'required',
            'idade'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',       // verificar se eh um numero valido 
            'sexo' => 'required',
            'email' => 'required|email',
            'cargo' => 'required',
            'telefone'=>'required'
        ]);

        Pessoa::whereId($id)->update($validarDados);
        return redirect('/pessoas')->with('success', 'Dados do funcionário(a) foram atualizados com sucesso!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();
        return redirect('/pessoas')->with('success', 'Funcionário(a) removido com sucesso!');
    }

    public function alterarStatus(Request $request, $id)
    {
        $pessoa = Pessoa::findOrFail($id);

        if($pessoa->status->value == StatusEnum::Ativo->value){
            $validarDados = [
                'status'=> StatusEnum::Inativo->value
            ];
        } else if($pessoa->status->value == StatusEnum::Inativo->value){
            $validarDados = [
                'status'=> StatusEnum::Ativo->value
            ];
        }
       
        Pessoa::whereId($id)->update($validarDados);

        return redirect('/pessoas')->with('success', 'Status do funcionário(a) foram atualizados com sucesso!');
    }
    
}
