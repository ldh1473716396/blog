<style>
.foot{
margin-top: 400px;
padding-top: 20px;
padding-bottom: 10px;
color: #cbcfd8;
background-color: #222222;
}

.foot a{ text-decoration:none; color: #cbcfd8;}
.foot a:hover{ text-decoration:underline; color: #ffffff;}
</style>


<div class="foot">
<div class="container">
    <p>基于Think PHP5.1，bootstrap4开发</p>
    <p>
        相关网站：
        {volist name="link" id="data"}
        <a href="{$data.link_url}" target="_blank">{$data.link_title}</a>
        &nbsp;
        {/volist}
    </p>
</div>
</div>

