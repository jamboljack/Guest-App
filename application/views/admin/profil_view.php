<link rel="stylesheet" type="text/css" href="<?=base_url();?>backend/js/sweetalert2.css">
<script src="<?=base_url();?>backend/js/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link href="<?=base_url();?>backend/assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Profil
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?=site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>                
                <li>
                    <a href="#">Profil</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#"><?=ucwords(strtolower($this->session->userdata('nama'))).' - '.$this->session->userdata('username'); ?></a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height red-thunderbird">
                    <i class="icon-calendar">&nbsp; </i><span class="uppercase visible-lg-inline-block"><?=tgl_indo(date('Y-m-d')); ?></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="profile-sidebar">
                    <div class="portlet light profile-sidebar-portlet">
                        <div class="profile-userpic">
                            <?php if (!empty($detail->user_avatar)) { ?>
                                <img src="<?=base_url(); ?>img/icon/<?=$detail->user_avatar; ?>" class="img-responsive" alt="">
                            <?php } else { ?>
                                <img src="<?=base_url(); ?>img/no-image.jpg" class="img-responsive" alt="">
                            <?php } ?>
                        </div>
                        <?php
                        $username = $this->session->userdata('username');
                        $dataUser = $this->menu_m->select_user($username)->row();
                        ?>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                            <?=$dataUser->user_name;?>
                            </div>
                            <div class="profile-usertitle-job">
                            <?=$dataUser->user_username;?>
                            </div>
                            <div class="profile-usertitle-job">
                            <?=$dataUser->user_level;?>
                            </div>
                        </div>
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li class="active">
                                    <a href="#"><i class="icon-settings"></i>Account Setting</a>
                                </li>                                   
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">                        
                            <div class="portlet box red-thunderbird">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-user"></i>Data Personal
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs ">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab">Data Account</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tab_1_1">
                                                <div class="portlet-body form">
                                                    <form class="form-horizontal" method="post" id="formInput" name="formInput" role="form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-3 control-label">Username</label>
                                                                        <div class="col-md-9">
                                                                            <div class="form-control form-control-static">
                                                                                <?=$detail->user_username; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Name</label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i>
                                                                                <input type="text" class="form-control" name="name" id="name" value="<?=$detail->user_name; ?>" autocomplete="off"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Department</label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i>
                                                                                <input type="text" class="form-control" name="dept" id="dept" value="<?=$detail->user_dept; ?>" autocomplete="off"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Mobile No.</label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i>
                                                                                <input type="text" class="form-control" name="hp" id="hp" value="<?=$detail->user_mobile; ?>" autocomplete="off"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Email</label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i>
                                                                                <input type="text" class="form-control" name="email" id="email" value="<?=$detail->user_email; ?>" autocomplete="off"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-3 control-label">Level</label>
                                                                        <div class="col-md-9">
                                                                            <div class="form-control form-control-static">
                                                                                <?=$detail->user_level; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions">
                                                            <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_1_2">
                                                <div class="portlet-body form">
                                                    <form class="form-horizontal" method="post" id="formAvatar" role="form" enctype="multipart/form-data">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Avatar</label>
                                                                        <div class="col-md-9">
                                                                            <?php if (!empty($detail->user_avatar)) { ?>
                                                                            <img src="<?=base_url(); ?>img/icon/<?=$detail->user_avatar; ?>" width="50"/>
                                                                            <?php } else { ?>
                                                                            <img src="<?=base_url(); ?>img/no-image.jpg" width="50" />
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Change Avatar</label>
                                                                        <div class="col-md-9">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail" style="width: 100px; height: 75px;">
                                                                                    <img src="<?=base_url('img/no-image.png'); ?>" alt=""/>
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 75px;">
                                                                                </div>
                                                                                <div>
                                                                                    <span class="btn default btn-file">
                                                                                    <span class="fileinput-new">Choose Avatar</span>
                                                                                    <span class="fileinput-exists">Change </span>
                                                                                        <input type="file" name="foto" accept=".png,.jpg,.jpeg,.gif" required>
                                                                                    </span>
                                                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">INFO !</span> Resolution : 100 x 150 Pixel
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions">
                                                            <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Change</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_1_3">
                                                <div class="portlet-body form">
                                                    <form class="form-horizontal" method="post" id="formPassword" role="form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">New Password</label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i>
                                                                                <input type="password" class="form-control" name="newpassword" id="newpassword" autocomplete="off" required />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Confirm Password</label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-icon right">
                                                                                <i class="fa"></i>
                                                                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" autocomplete="off" required />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions">
                                                            <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Change Password</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>

<script type="text/javascript" src="<?=base_url(); ?>backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?=base_url(); ?>backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript">
// Reset Form Profil
function resetformInput() {
    var MValid = $("#formInput");
    MValid.validate().resetForm();
    MValid.find(".has-success, .has-warning, .fa-warning, .fa-check").removeClass("has-success has-warning fa-warning fa-check");
    MValid.find("i.fa[data-original-title]").removeAttr('data-original-title');
}
// Reset Form Ubah Password
function resetformPassword() {
    $("#password").val('')
    $("#confirmpassword").val('')
    var MValid = $("#formPassword");
    MValid.validate().resetForm();
    MValid.find(".has-success, .has-warning, .fa-warning, .fa-check").removeClass("has-success has-warning fa-warning fa-check");
    MValid.find("i.fa[data-original-title]").removeAttr('data-original-title');
}

$(document).ready(function() {
    var form        = $('#formInput');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);
    
    $("#formInput").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            name: { required: true, minlength: 5 },
            dept: { required: true },
            hp: { required: true, minlength:11, number: true },
            email: { required: true, minlength:5, email: true },
            desc: { required: true, minlength:5 }
        },
        messages: {
            name: {
                required:'Name required', minlength:'Min. 5 Character'
            },
            dept: {
                required:'Depertment required'
            },
            hp: {
                required:'Mobile No. required', minlength:'Min. 11 Digit', 
                number: 'Mobile No. only Number'
            },
            email: {
                required:'Email required', minlength:'Min. 5 Character', email:'Email not Valid'
            },
            desc: {
                required:'Description required', minlength:'Min. 5 Character'
            }
        },
        invalidHandler: function (event, validator) {
            success.hide();
            error.show();
            Metronic.scrollTo(error, -200);
        },
        errorPlacement: function (error, element) {
            var icon = $(element).parent('.input-icon').children('i');
            icon.removeClass('fa-check').addClass("fa-warning");  
            icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
        },
        highlight: function (element) {
            $(element)
            .closest('.form-group').removeClass("has-success").addClass('has-error');
        },
        unhighlight: function (element) {
        },
        success: function (label, element) {
            var icon = $(element).parent('.input-icon').children('i');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            icon.removeClass("fa-warning").addClass("fa-check");
        },
        
        submitHandler: function(form) {
            dataString = $("#formInput").serialize();
            $.ajax({
                url: "<?=site_url('admin/profil/updateprofil'); ?>",
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal({
                        title:"Success",
                        text: "Update Data Success",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    resetformInput();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Update Data');
                }
            });
        }
    });
});

$(document).ready(function() {
    var form        = $('#formAvatar');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);
    
    $("#formAvatar").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            foto: {
                required: true
            }
        },
        messages: {
        },
        invalidHandler: function (event, validator) {
            success.hide();
            error.show();
            Metronic.scrollTo(error, -200);
        },
        errorPlacement: function (error, element) {
            var icon = $(element).parent('.input-icon').children('i');
            icon.removeClass('fa-check').addClass("fa-warning");  
            icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
        },
        highlight: function (element) {
            $(element)
            .closest('.form-group').removeClass("has-success").addClass('has-error');
        },
        unhighlight: function (element) {
        },
        success: function (label, element) {
            var icon = $(element).parent('.input-icon').children('i');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            icon.removeClass("fa-warning").addClass("fa-check");
        },
        submitHandler: function(form) {
            var formData = new FormData($('#formAvatar')[0]);
            $.ajax({
                dataType: 'json',
                data: formData,
                async: true,
                url: "<?=site_url('admin/profil/updateavatar'); ?>",
                type: "POST",
                success: function(data) {
                    if (data.status === 'success') {
                        setTimeout(function() {
                            swal({
                                title:"Success",
                                text: "Update Avatar Success",
                                timer: 2000,
                                showConfirmButton: false,
                                type: "success"
                            }, function() {
                                location.reload();
                            })
                        });
                    } else {
                        setTimeout(function() {
                            swal({
                                title:"Failed",
                                text: "File must type (JPG/PNG/JPEG)",
                                timer: 2000,
                                showConfirmButton: false,
                                type: "error"
                            })
                        });
                    }
                },
                error: function() {
                    setTimeout(function() {
                        swal({
                            title:"Error",
                            text: "Update Avatar Failed",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        })
                    });
                },

                cache: false,
                contentType: false,
                processData: false
            });
        }
    });
});

$(document).ready(function() {
    var form        = $('#formPassword');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);
    
    $("#formPassword").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            newpassword: { required: true, minlength: 5 },
            confirmpassword: { required: true, equalTo: "#newpassword" }
        },
        messages: {
            newpassword: {
                required:'New Password required', minlength:'Min. 5 Character'
            },
            confirmpassword: {
                required:'Confirm Password required', minlength:'Min. 5 Character',
                equalTo: "Confirm Password must be equivalen New Password"
            }
        },
        invalidHandler: function (event, validator) {
            success.hide();
            error.show();
            Metronic.scrollTo(error, -200);
        },
        errorPlacement: function (error, element) {
            var icon = $(element).parent('.input-icon').children('i');
            icon.removeClass('fa-check').addClass("fa-warning");  
            icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
        },
        highlight: function (element) {
            $(element)
            .closest('.form-group').removeClass("has-success").addClass('has-error');
        },
        unhighlight: function (element) {
        },
        success: function (label, element) {
            var icon = $(element).parent('.input-icon').children('i');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            icon.removeClass("fa-warning").addClass("fa-check");
        },
        submitHandler: function(form) {
            dataString = $("#formPassword").serialize();
            $.ajax({
                url: "<?=site_url('admin/profil/updatepassword'); ?>",
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal({
                        title:"Success",
                        text: "Update Password Success",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    resetformPassword();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Change Password');
                }
            });
        }
    });
});
</script>