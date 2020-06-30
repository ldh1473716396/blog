
<!--发件箱-->
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
            <th scope="col">收信人</th>
            <th scope="col">时间</th>
            <th scope="col">操作</th>
        </tr>
        </thead>

        <?php $out_id = Session::get('user_id');
        $mail_out_data = db('mail')->where('out_id',$out_id)->select();
        ?>
        <?php foreach($mail_out_data as $k1 => $v1): ?>
            <tbody>
            <tr>
                <th scope="row">{$v1.id}</th>
                <td>{$v1.mail_title}</td>
                <td>
                <?php $in = db('user')->where('id',$v1['in_id'])->find();?>{$in.user_name}</td>
                <td>{$v1.createTime|date="Y-m-d H:i:s"}</td>
                <td>

                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                查看
                </button>

                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                内容
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                {$v1.mail_content}
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