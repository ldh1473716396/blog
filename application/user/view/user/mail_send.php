
<!--发私信-->
<form action="{:url('user/mail',array('out_id'=>$Request.session.user_id))}" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">收信人</label>
        <select id="inputState" class="form-control" name="in_id">

            {volist name="user" id="data"}
            {if $data['id'] != $Request.session.user_id}
            <option value="{$data.id}">{$data.user_name}</option>
            {/if}
            {/volist}

        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">标题</label>
        <input name="mail_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="请输入标题" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">内容</label>
        <textarea name="mail_content" type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="请输入内容" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">发送</button>
</form>
