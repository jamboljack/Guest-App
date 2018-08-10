<?php
$meta = $this->menu_m->select_meta()->row();
?>
<div class="login-container lightmode">
    <div class="login-box animated fadeInDown">
        <div class="login-logo"></div>
        <div class="login-body">
            <div class="login-title"><strong>Log In</strong> ke Dashboard</div>
            <?php
            if ($this->session->flashdata('notification')) {
            ?>
            <div class="alert alert-danger" align="center">
                <?=$this->session->flashdata('notification');?>
            </div>
            <?
            }
            ?>
            <form action="<?=site_url('login_admin/validasi');?>" class="form-horizontal" method="post">
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" class="form-control" name="username" placeholder="Username" pattern="^[a-zA-Z0-9-_\.]{1,20}$" title="Jangan Pakai SPASI" minlength="5" autocomplete="off" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger btn-block"><i class="fa fa-sign-in"></i> Login</button>
                </div>
            </div>
            </form>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; <?=date('Y');?> | <?=$meta->meta_name;?>
            </div>
        </div>
    </div>
</div>