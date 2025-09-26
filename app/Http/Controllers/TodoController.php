<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function create(Request $r) {
        $data = $r->validate([
            "text" => "string",
            "user_id" => "uuid",
        ]);
        Todo::create($data);
        return redirect()->route('dashboard');
    }

    public function delete(Request $r) {
        $id = $r->query('id');
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('dashboard');
    }
}
