<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-{{$project->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editModalLabel-{{$project->id}}">编辑项目</h4>
            </div>
            <div class="modal-body">
                <!-- 表单开始 -->
                <form action="{{ route('project.update',$project->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="project">项目名称:</label>
                        <input type="text" name="name" class="form-control" value="{{$project->name}}">
                    </div>
                    <div class="form-group">
                        <label for="uploadfile">上传文件:</label>
                        <input type="file" name="thumbnail" id="uploadfile">
                    </div>

                    @include('errors.error')

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