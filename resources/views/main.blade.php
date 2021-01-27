@extends('layout')

@section('content')


    <main class="container">

        <div class="starter-template text-center py-5 px-3">
            <h1>Мои задачи</h1>

          @if(isset($message))
                <div class="alert alert-success">
                    {{$message}}
                </div>
            @endif
            @foreach($data as  $task)
                <div class="container" style="text-align: left">
                <h1 class="mt-5">{{$task['name']}}</h1>
                    <p class="lead">{{$task['description']}}</p>
                    <p class="lead">Нужно сделать: {{$task['date']}}</p>
                    <p class="lead"><a href="{{route('update',$task['id'])}}"><button class="btn btn-primary">Редактировать</button></a></p>
                    <p class="lead"><a href="{{route('delete',$task['id'])}}"><button class="btn btn-danger">Удалить</button></a></p>
                </div>

            @endforeach

            <a class="nav-link" href="add"><button class="btn btn-success">+Добавить задачу</button></a>
        </div>

    </main>
@endsection
