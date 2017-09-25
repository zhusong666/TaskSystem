<!-- Modal -->
<div class="modal fade" id="editTaskModal-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="editTaskModalLabel-{{$value->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editTaskModalLabel-{{$value->id}}">编辑项目</h4>
            </div>
            <div class="modal-body">
                <!-- 表单开始 -->
                <form action="{{ route('task.update',$value->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="project">项目名称:</label>
                        <input type="text" name="title" class="form-control" value="{{$value->title}}">
                    </div>

                    <div class="col-md-offset-9">
                        <input class="btn btn-primary" type="reset" value="重置">
                        <input class="btn btn-info" type="submit" value="提交">
                    </div>
                </form>
                <!-- 表单结束 -->
            </div>

        </div>
    </div>
</div>