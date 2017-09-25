<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    增加任务
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">增加项目</h4>
            </div>
            <div class="modal-body">
                <!-- 表单开始 -->
                <form action="{{ route('project.store' )}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="project">项目名称:</label>
                        <input type="text" name="name" class="form-control" id="project" placeholder="请输入项目名称">
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