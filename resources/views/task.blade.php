@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-inline" action="{{route('task.store',['project_id'=>$project_id])}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="请添加任务">
            </div>

            <button type="submit" class="btn btn-info">添加</button>


        </form>
    <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#todo" aria-controls="home" role="tab" data-toggle="tab">未完成</a></li>
            <li role="presentation"><a href="#done" aria-controls="profile" role="tab" data-toggle="tab">已完成</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="todo">
                    <table class="table table-striped">
                        @foreach($todo as $value)
                            <tr>
                                <td class="col-md-9" >{{$value->title}}</td>
                                <td class="col-md-3"><button type="submit" class="btn btn-primary">完成</button><button type="submit" class="btn btn-success" data-toggle="modal" data-target="#editTaskModal-{{$value->id}}">编辑</button><button type="submit" class="btn btn-success">删除</button></td>
                            </tr>
                            @include('layouts.edit_task_modal')
                        @endforeach
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="done">
                    @foreach($done as $value)
                        <tr>
                            <td class="col-md-9" >{{$value->title}}</td>
                            <td class="col-md-3"><button type="submit" class="btn btn-success">删除</button></td>
                        </tr>
                    @endforeach
                </div>

        </div>
    </div>
    <style>
        button{
            margin: 0 5px;
        }
    </style>
@endsection