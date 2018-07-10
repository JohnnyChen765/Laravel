@extends('layouts.mains')
@section('addcss')
    <link href="{{ asset('css/listPagecss.css') }}" rel="stylesheet" type="text/css" >
@endsection

@section('content')
    Voici vos listes :<br>
    <!--<form action='home' method="post" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p>
                <label for="list_name">Nom de la liste</label>:<input type="text" name="list_name" id="list_name" /><br>
                <label for="commentaires">Commentaires</label>:<input type="textarea" name="commentaires" id="commentaires"/><br>
                <input type="submit" value="Valider" />
            </p>
    </form>-->
    {{Form::open(array('route'=>'addList'))}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{Form::label('list_name','Nom de la liste :')}}
    {{Form::text('list_name')}}<br>
    {{Form::label('commentaires','commentaires :')}}<br> 
    {{Form::textarea('commentaires')}}<br>
    {{Form::submit('Valider')}}
    {{Form::close()}}
    <p><a href='/logged/logout' class=logout_link><h2>Log out</h2></a></p>
    <div class='container'> 
        <div class='row'>
            @foreach($list_array as $liste) <!-- reçoit du controller $list_array contenant list_name,commentaire,done-->
                <div class='col-lg-3 offset-lg-0 list'>
                    <h2><a href="{{ 'home/list/'.$liste->list_id}}"> {{$liste->list_name}}</a></h2>
                    <p>{{$liste->commentaires}}</p>
                    <!--{{Form::open(array('method'=>'delete','route' => array('deleteList',$liste->list_id)))}}-->
                    {{Form::open(['method' => 'DELETE', 'route' => ['deleteList', $liste->list_id]])}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <p>
                            <input class='delete_button' type="submit" value="delete">
                        </p>
                    {{Form::close()}}
                           
                </div>
            @endforeach
        </div>
@endsection