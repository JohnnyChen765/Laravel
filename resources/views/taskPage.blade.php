@extends('layouts.mains')
@section('addcss')
<link href="{{ asset('css/listPagecss.css') }}" rel="stylesheet" type="text/css" >

@endsection

@section('content')
    {{Form::open(array('route'=>array('addTask',$list_id)))}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{Form::label('task_name','Nom de la tâche :')}}
    {{Form::text('task_name')}}<br>
    {{Form::label('commentaires','commentaires :')}}<br> 
    {{Form::textarea('commentaires')}}<br>
    {{Form::submit('Valider')}}
    {{Form::close()}}
    <p><a href= "{{route('showList')}}" class="retour_home"><h2>Retourner à la page de vos listes</h2></a>
    <p><a href='/logged/logout' class=logout_link><h2>Log out</h2></a></p>
    <div class='container'> 
        <div class='row'>
            @foreach($task_array as $task) <!-- reçoit du controller $list_array contenant list_name,commentaire,done-->
                <div class='col-lg-3 offset-lg-0 list'>
                    <h2>{{$task->task_name}}</h2>
                    <p>{{$task->commentaires}}</p>
                    {{Form::open(['method' => 'DELETE', 'route' => ['deleteTask',$list_id, $task->task_id]])}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <p>
                            <input class='delete_button' type="submit" value="delete">
                        </p>
                    {{Form::close()}}
                </div>
            @endforeach
        </div>
@endsection