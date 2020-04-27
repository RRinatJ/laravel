<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
    //
    public function index(Request $request) {
        
        $params = $request->all();

        $tasks = Task::select("*");

        if($this->check($params, "role")){
            $tasks->where("role_id", $params["role"]);
        }

        if($this->check($params, "responsible")){
            $tasks->where("responsible_id", $params["responsible"]);
        }

        if($this->check($params, "author")){
            $tasks->where("author_id", $params["author"]);
        }

        if($this->check($params, "title")){
            $tasks->where("title", "like", "%".$params["title"]."%");
        }

        if($this->check($params, "status")){
            $tasks->where("status_id", $params["status"]);
        }

        if($this->check($params, "finish_time")){
            $tasks->whereDate("finish_time", $params["finish_time"]);
        }

        return $tasks->get();
    }

    public function check($params, $key){
        if(isset($params[$key]) && !empty($params[$key]))return true;
        return false;
    }
}
