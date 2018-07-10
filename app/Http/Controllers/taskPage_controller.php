<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taskList_model;
use Auth;
class taskPage_controller extends Controller
{
    public function showTask($list_id){//reçoit la variable {list_id} de la route
        $task_model = new taskList_model;
        $task_array = $task_model->select('task_id','task_name','list_id','commentaires','done?')->where('list_id','=',$list_id)->get();
        return view('taskPage',['task_array'=>$task_array,'list_id'=>$list_id]);
    }

    public function addTask($list_id){

        $taskList= new taskList_model;
        $taskList->insert(['task_name'=>$_POST['task_name'],'list_id'=>$list_id,'commentaires'=>$_POST['commentaires']]);
        //$task_array = $taskList->select('task_id','task_name','list_id','commentaires','done?')->where('list_id','=',$list_id)->get();

        //return view('taskPage',['task_array'=>$task_array]);
        return redirect()->route('showTask',$list_id);
    }

    public function deleteTask($list_id,$task_id){

        $taskList= new taskList_model;
        $taskList->where('task_id','=',$task_id)->delete();
        
        return redirect()->route('showTask',$list_id);
    }
}
