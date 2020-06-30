{extend name="index/index"}
{block name="content"}

<!--个人中心-->
<div class="container" style="margin-top: 30px;">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">博客</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">资料</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">私信</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent" style="margin-top: 20px;">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">{include file="user/blog"}</div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">{include file="user/data"}</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">{include file="user/mail"}</div>
    </div>

</div>
{/block}