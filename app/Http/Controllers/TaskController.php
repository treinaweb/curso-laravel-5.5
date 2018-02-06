<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = DB::table('tasks')->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = DB::table('tasks')->insert([
            'subject'       => $request->subject,
            'made'          => $request->made,
            'description'   => $request->description,
        ]);

        if ($task) {
            $request->session()->flash('success', 'Task cadastrada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao cadastrar tarefa');
        }
        
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();

        return view('tasks.edit', compact('task'));
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
        $result = DB::table('tasks')
                    ->where('id', $id)
                    ->update([
                        'subject'       => $request->subject,
                        'made'          => $request->made,
                        'description'   => $request->description,
                    ]);

        if ($result) {
            $request->session()->flash('success', 'Tarefa atualizada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao atualizar tarefa');
        }
        
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $result = DB::table('tasks')->where('id', $id)->delete();

        if ($result) {
            $request->session()->flash('success', 'Tarefa deletada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao deletar tarefa');
        }

        return redirect()->route('tasks.index');
    }
}
