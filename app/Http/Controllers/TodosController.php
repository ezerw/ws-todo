<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transformers\TodoTransformer;

class TodosController extends ApiController
{

    /**
     * List User Todos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Auth::user()->todos;
        return $this->respondWithCollection($todos, new TodoTransformer);
    }

    /**
     * Store Todo.
     *
     *
     * @param CreateTodoRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTodoRequest $request)
    {
        $todo = new Todo;
        $todo->name = $request->get('name');
        $todo->user_id = Auth::user()->id;

        try{
            $todo->save();
        } catch (Exception $e){
            return $this->errorInternalError();
        }

        return $this->respondWithItem($todo, new TodoTransformer);
    }

    /**
     * Update Todo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $todo->completed = !$request->get('completed');
        $todo->save();

        return $this->respondWithItem($todo, new TodoTransformer);
    }

    /**
     * Remove Todo.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        $todos = Auth::user()->todos;
        return $this->respondWithCollection($todos, new TodoTransformer);

    }
}
