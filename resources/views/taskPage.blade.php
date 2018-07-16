@extends('layouts.mains')
@section('addcss')
@endsection

@section('form_type')
Créer une tâche
@endsection

@section('form_content')
            {{Form::open(array('route'=>array('addTask',$list_id)))}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{Form::label('task_name','Nom de la tâche :')}}
            {{Form::text('task_name')}}<br>
            {{Form::label('commentaires','commentaires :')}}<br> 
            {{Form::textarea('commentaires')}}<br>
            {{Form::submit('Valider')}}
            {{Form::close()}}
        </div>
    </div>
@endsection

@section('add_button')
    <button onclick="goList()" class="dropbtn">Retour aux listes</button>
    <!--<p><a href= "{{route('showList')}}" class="retour_home"><h2>Retourner à la page de vos listes</h2></a>-->
@endsection

@section('content')
    <div class='container'> 
        <div class='row'>
            @foreach($task_array as $task) <!-- reçoit du controller $list_array contenant list_name,commentaire,done-->
                <ul>
                    <li>    
                        <!-- DELETE Button-->
                        {{Form::open(['method' => 'DELETE', 'route' => ['deleteTask',$list_id, $task->task_id]])}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <p><input class='delete_button' type="submit" value="delete"></p>
                        {{Form::close()}}

                        @if($task->done)
                            <!--checkbox done -->
                            {{Form::open(['method' => 'DELETE', 'route' => ['deleteTask',$list_id, $task->task_id]])}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            done
                            {{Form::checkbox('checkbox', 'done',true, array('class' => 'checkboxSize'))}}
                            {{Form::close()}}
                            <div class='col-lg-3 offset-lg-0 list done ' >
                                <input class='saveEdit_btn hidden' type="submit" value="save" onclick="update">
                                <h2 contenteditable="true" onclick="editText()" class="edit">{{$task->task_name}}</h2>
                                <p contenteditable="true" onclick="editText()" class="edit">
                                    {{$task->commentaires}}
                                </p>
                            
                            </div>
                        @else
                            <!--checkbox done -->
                            {{Form::open(['method' => 'DELETE', 'route' => ['deleteTask',$list_id, $task->task_id]])}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            done
                            {{Form::checkbox('checkbox', 'done',null, array('class' => 'checkboxSize'))}}
                            {{Form::close()}}
                            <div class='col-lg-3 offset-lg-0 list not_done ' >
                                <h2>{{$task->task_name}}</h2>
                                <p>{{$task->commentaires}}</p>
                            </div>
                        @endif
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection

@section('add_js')
    <script>
        function goList(){
            window.location.replace("{{route('showList')}}");
        }
        function editText(){
            var oldText = document.querySelector('.edit');
            //document.querySelector("saveEdit_btn").toggle("show");
           document.querySelector(".saveEdit_btn").classList.toggle('show');
        }
        window.onclick = function(event) {
            if (!event.target.matches('.edit')) {
                var dropdowns = document.querySelector('.saveEdit_btn');
                if (dropdowns.classList.contains('show')) {
                        dropdowns.classList.remove('show');
                }
            }
        }
    </script>
@endsection