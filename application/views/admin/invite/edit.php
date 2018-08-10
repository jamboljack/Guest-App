<link href="<?=base_url();?>backend/js/sweetalert2.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url();?>backend/js/sweetalert2.min.js"></script>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Invite
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?=site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?=site_url('admin/invite');?>">Invite</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Edit Invite</a>
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

                <div class="portlet box red-thunderbird">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-edit"></i> Form Edit Invite
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" method="post" id="formInput" name="formInput">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="invite_id" value="<?=$detail->invite_id;?>">

                            <div class="form-body">
                                <h4 class="form-section">Data Family</h4>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="name" value="<?=$detail->family_name;?>" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">Gender</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="gender" value="<?=$detail->family_gender;?>" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="address" value="<?=$detail->family_address;?>" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">Phone</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="phone" value="<?=$detail->family_phone;?>" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <h4 class="form-section">Data Invitation</h4>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">Barcode ID</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="barcode" value="<?=$detail->invite_code;?>" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Table Name</label>
                                    <div class="col-md-3">
                                        <div class="input-icon right"><i class="fa"></i>
                                            <select class="form-control" name="lstTable" id="lstTable">
                                                <option value="">- Choose -</option>
                                                <?php 
                                                foreach($listTable as $r) {
                                                    if($detail->table_id == $r->table_id) {
                                                        $select = "selected";
                                                    } else {
                                                        $select = "";
                                                    } 
                                                ?>
                                                <option value="<?=$r->table_id;?>" <?=$select;?>><?=$r->table_name;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">                    
                                    <label class="col-md-3 control-label">Number</label>
                                    <div class="col-md-3">
                                        <div class="input-icon right"><i class="fa"></i>
                                            <input type="text" class="form-control" placeholder="0" name="number" id="number" value="<?=$detail->invite_count;?>" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Update</button>
                                        <a href="<?=site_url('admin/invite'); ?>" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>            
</div>

<script type="text/javascript" src="<?=base_url();?>backend/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>backend/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?=base_url();?>backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript">
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
            name: { required: true },
            lstTable: { required: true },
            number: { required: true, number: true }
        },
        messages: { 
            name: { required :'Name required' },
            lstTable: { required :'Table Name required' },
            number: { required :'Number required', number: 'Only Number' }
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
            dataString = $('#formInput').serialize();
            $.ajax({
                url: "<?=site_url('admin/invite/updatedata'); ?>",
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
                    window.location="<?=site_url('admin/invite');?>";
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Update Data');
                }
            });
        }
    });
});
</script>