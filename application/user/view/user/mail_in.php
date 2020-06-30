
<!--收件箱-->
<div class="table-responsive">
    <table class="table table-hover">

        <colgroup>
        <col width="10%">
        <col width="30%">
        <col width="20%">
        <col width="20%">
        <col width="20%">
        </colgroup>

        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">标题</th>
            <th scope="col">发送人</th>
            <th scope="col">时间</th>
            <th scope="col">操作</th>
        </tr>
        </thead>

        <?php $in_id = Session::get('user_id');
        $mail_in_data = db('mail')->where('in_id',$in_id)->select();
        ?>
        <?php foreach($mail_in_data as $k => $v): ?>
            <tbody>
            <tr>
                <th scope="row">{$v.id}</th>
                <td>{$v.mail_title}</td>
                <td>
                <?php $out = db('user')->where('id',$v['out_id'])->find();?>{$out.user_name}</td>
                <td>{$v.createTime|date="Y-m-d H:i:s"}</td>
                <td>
                
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                    查看
                    </button>

                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        内容
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        {$v.mail_content}
                        </div>
                    </div>
                    </div>
                    </div>

                    <a class="btn btn-danger btn-sm" href="#" role="button">删除</a>
                </td>
            </tr>
            </tbody>
        <?php endforeach; ?>

    </table>
</div>
