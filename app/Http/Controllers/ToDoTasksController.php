<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class ToDoTasksController extends Controller
{

    /**
     *
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if ($this->taskRepository->find($id)) {
            $request->session()->push('todotasks', $id);

            return back();
        }

        return back()->with('error', 'Não foi possível adicionar tarefa a lista de pendentes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = session('todotasks');

        $ids = array_where($ids, function($value, $key) use ($id) {
            return $value != $id;
        });

        session(['todotasks' => $ids]);

        return redirect()->route('clients.index');
    }
}
