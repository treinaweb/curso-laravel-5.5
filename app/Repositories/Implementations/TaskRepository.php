<?php

namespace App\Repositories\Implementations;

use App\Repositories\Base\QueryBuilderRepository;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository extends QueryBuilderRepository implements TaskRepositoryInterface
{

  /**
   * nome da tabela
   *
   * @var string
   */
    protected $table = 'tasks';

    /**
     * procura tarefa por assunto
     *
     * @param [type] $subject
     * @return void
     */
    public function getBySubject($subject)
    {
        $subject = '%' . $subject . '%';

        return \DB::table($this->table)
              ->where('subject', 'like', $subject)
              ->get();
    }
}
