<link href="<?=base_url();?>backend/js/sweetalert2.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url();?>backend/js/sweetalert2.min.js"></script>

<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">
            Arrive
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?=site_url('admin/home');?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?=site_url('admin/arrive');?>">Arrive</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Add Arrive / Scan Barcode</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height red-thunderbird">
                    <i class="icon-calendar">&nbsp; </i><span class="uppercase visible-lg-inline-block"><?=tgl_indo(date('Y-m-d'));?></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="portlet box red-thunderbird">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-plus-circle"></i> Form Add Arrive / Scan Barcode
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="fullscreen" data-original-title="Full Screen" title="Full Screen"></a>
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal formScan" method="post" id="formBarcode" name="formBarcode">
                            <div class="form-body">
                                <div class="alert alert-success" id="divSuccess" align="center"></div>
                                <div class="alert alert-danger" id="divError" align="center"></div>

                                <h4 class="form-section" align="center"><b>Scan Barcode ID</b></h4>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Barcode ID</label>
                                    <div class="col-md-3">
                                        <div class="input-icon right"><i class="fa"></i>
                                            <input type="text" class="form-control" name="barcode" id="barcode"autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                        <a onclick="resetForm()" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form role="form" class="form-horizontal formScan" method="post" id="formArrive" name="formArrive">
                        <input type="hidden" name="id" id="id">
                            <div class="form-body">
                                <h4 class="form-section" align="center"><b>Data Invitation</b></h4>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-4 control-label">Address</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="address" id="address" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-4 control-label">Phone</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="phone" id="phone" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-4 control-label">Table Name</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="table" id="table" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-4 control-label">Count</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="count" id="count" autocomplete="off" placeholder="0" readonly>
                                    </div>
                                </div>
                                <div class="form-group" id="countarrive">
                                    <label class="col-md-4 control-label">Count Arrive</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="count_arrive" id="count_arrive" placeholder="0" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12" align="center">
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Save</button>
                                        <a href="<?=site_url('admin/arrive');?>" type="button" class="btn btn-warning"><i class="fa fa-times"></i> Cancel</a>
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
function resetForm() {
    $("#barcode").val('');
    $("#id").val('');
    $("#name").val('');
    $("#address").val('');
    $("#phone").val('');
    $("#table").val('');
    $("#count").val(0);
    $("#count_arrive").val(0);
    $("#divSuccess").hide();
    $("#divError").hide();
    $("#countarrive").hide();
    $("#barcode").focus();

    var MValid = $(".formScan");
    MValid.validate().resetForm();
    MValid.find(".has-success, .has-warning, .fa-warning, .fa-check").removeClass("has-success has-warning fa-warning fa-check");
    MValid.find("i.fa[data-original-title]").removeAttr('data-original-title');
}

$(document).ready(function() {
    $("#divSuccess").hide();
    $("#divError").hide();
    $("#countarrive").hide();

    var form        = $('#formBarcode');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);

    $("#formBarcode").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            barcode: { required: true, number: true },
        },
        messages: {
            barcode: { required :'Barcode ID required', number:'Only Number' },
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
            $.ajax({
                type: "POST",
                url: "<?=site_url('admin/arrive/scandata');?>",
                data: {
                    barcode : $("#barcode").val()
                },
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {
                    if(response.status === "success") {
                        $("#id").val(response.id);
                        $("#name").val(response.name);
                        $("#address").val(response.address);
                        $("#phone").val(response.phone);
                        $("#table").val(response.table);
                        $("#count").val(response.count);

                        $("#divSuccess").show();
                        $("#divError").hide();
                        $("#divSuccess").html('<b>'+response.msg+'</b>');
                        $("#countarrive").show();
                        $("#count_arrive").focus();
                    } else {
                        $("#barcode").val('');
                        $("#id").val('');
                        $("#name").val('');
                        $("#address").val('');
                        $("#phone").val('');
                        $("#table").val('');
                        $("#count").val('');

                        $("#divSuccess").hide();
                        $("#divError").show();
                        $("#divError").html('<b>'+response.msg+'</b>');
                        $("#countarrive").hide();
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            })
        }
    });
});

$(document).ready(function() {
    var form        = $('#formArrive');
    var error       = $('.alert-danger', form);
    var success     = $('.alert-success', form);

    $("#formArrive").validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            count_arrive: { required: true, number: true }
        },
        messages: {
            count_arrive: {
                required :'Count Arrive required', number:'Only Number'
            }
        },
        invalidHandler: function (event, validator) {
            success.hide();
            error.show();
            Metronic.scrollTo(error, -200);
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        success: function (label) {
            label.closest('.form-group').removeClass('has-error');
        },
        submitHandler: function(form) {
            dataString = $("#formArrive").serialize();
            $.ajax({
                url: '<?=site_url('admin/arrive/savedata');?>',
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal({
                        title:"Success",
                        text: "Save Data Success",
                        timer: 2000,
                        showConfirmButton: false,
                        type: "success"
                    });
                    resetForm();
                },
                error: function() {
                    swal({
                        title:"Error",
                        text: "Save Data Failed",
                        timer: 2000,
                        showConfirmButton: false,
                        type: "error"
                    });
                }
            });
        }
    });
});
</script>