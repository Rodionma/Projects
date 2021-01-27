@extends('layout')

@section('content')



    <main class="container">

        <div class="starter-template text-center py-5 px-3">
            <h1>Обновить задачу</h1>

        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </ul>
            </div>

        @endif


        <form method="post" action="{{route('updatesubmit')}}">
            @csrf

            <input type="hidden" name="id" id="id" value="{{$data['id']}}">
            <div class="form-group">
                <label for="name" class="form-label">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$data['name']}}" placeholder="Введите задачу">
            </div>
            <div class="form-group">
                <label for="date" class="form-label">Дата</label>
                <input type="date" name="date" class="form-control" id="date" value="{{$data['date']}}" placeholder="Введите дату">
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Описание</label>
                <textarea name="description" id="description" class="form-control" placeholder="Опишите задачу" rows=6>{{$data['description']}} </textarea>
            </div>

            <hr class="my-4">
            <button class="btn btn-success" type="submit">Обновить</button>
        </form>

    </main>
@endsection
