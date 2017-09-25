@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($projects)
            @foreach($projects as $project)
                <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <ul class="icon-bar">
                                <a href="javascript:;" onclick="del({{$project->id}})"><li><i class="fa fa-btn glyphicon glyphicon-remove"></i></li></a>
                                <li><i data-toggle="modal" data-target="#editModal" class="fa fa-btn glyphicon glyphicon-pencil"></i></li>
                            </ul>
                            <a href="{{route('project.show',"$project->id")}}">
                                <img src="{{asset('thumbnail/'.$project->thumbnail)}}" alt="{{$project->name}}">
                            </a>
                                <div class="caption">
                                    <a href="{{route('project.show',"$project->id")}}">
                                <h3 class="text-center">{{$project->name}}</h3>
                            </a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
    </div>
    @endif
    <div class="row">
        <div class="col-md-10">
            @include('layouts.create_project_modal')
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            @include('layouts.edit_project_modal')
        </div>
    </div>
</div>
<style>
    .thumbnail{
        position: relative;
        padding: 0;
    }
    .thumbnail .caption {
        padding: 0;
        color: #333;
    }
    .container a{
        text-decoration: none;
    }
    .icon-bar{
        position: absolute;
        padding: 0;
        width:100%;
        z-index: 100;
        opacity: 10;
        list-style-type: none;
        background-color: #5bc0de;
        top:0;
        cursor: pointer;
    }
    .icon-bar li{
        float: right;
    }
</style>
@endsection

@section('myJS')
    <script>
        $(function(){
            $(".thumbnail .icon-bar").hide();
            $('.thumbnail').hover(function(){
                $(this).find(".icon-bar").toggle();
            });
        });
        function del(id){
            confirm('确定要删除吗?')
            $.post('{{url('project')}}/'+id,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
                if(data==1){
                    window.location.href = window.location.href;
                }
            });
        }

    </script>
@endsection
