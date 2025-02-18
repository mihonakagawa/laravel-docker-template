@extends('layouts.base')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <p class="text-left">
        <a class="btn btn-success" href="{{ route('todo.create') }}">ToDoを追加</a>
      </p>
      <div class="card">
        <div class="card-header">
          ToDo一覧
        </div>
        <div class="list-group list-group-flush">
          @foreach ($todos as $todo)
            <!-- $todosの中身：todoController内の、allメソッドの返り値。Collectionクラスのインスタンス -->
            <!-- foreachでobjectも回せる -->
            <div class="d-flex align-items-center p-2">
              <span class="col-9">{{ $todo->content }}</span>
              <!-- $todo：object型。 -->
              <!-- route()の第二引数には、ルートパラメータを指定 -->
              <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-info ml-3">詳細</a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection