<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\listUser_model;
use App\taskList_model;
class listPage_controller extends Controller
{    
    private $id_user;
    private $listUser;         
    function __construct() {

    }
    //on reçoit le pseudo et le mdp
    public function showList(){
        /*$user = new user_model;
        $id_user = $user->where('pseudo','=',$pseudo_user)
                        ->where('password','=',$password_user)
                        ->value('id');*/
        $id_user = Auth::user()->id ; 
        $listUser = new listUser_model;
        $list_array = $listUser->select('list_name','commentaires','done?','list_id')->where('user_id','=',$id_user)->get(); 
        return view('listPage',['list_array'=>$list_array]);
    }

    public function addList(){
        $list_name = $_POST['list_name'];
        $commentaires=$_POST['commentaires'];
        $id_user = Auth::user()->id ; 
        $listUser= new listUser_model;
        $listUser->insert(['list_name'=>$list_name,'user_id'=>$id_user,'commentaires'=>$commentaires]);
        //$list_array = $listUser->select('list_name','commentaires','done?','list_id')->where('user_id','=',$id_user)->get(); 
        return redirect('logged/home');
        //return view('listPage',['list_array'=>$list_array]);
    }

    public function deleteList($list_id){
        $id_user = Auth::user()->id ; 
        $listUser= new listUser_model;
        $listUser->where('list_id','=',$list_id)->delete();
        //$list_array = $listUser->select('list_name','commentaires','done?','list_id')->where('user_id','=',$id_user)->get(); 
        return redirect('logged/home');
    }
}
