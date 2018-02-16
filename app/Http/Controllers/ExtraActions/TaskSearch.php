<?php

namespace App\Http\Controllers\ExtraActions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskSearch extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function __invoke(TaskRepositoryInterface $taskRepository, Request $request)
    {
        return $taskRepository->getBySubject($request->search);
    }
}
