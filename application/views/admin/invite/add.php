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
                    <a href="#">Add Invite</a>
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
                            <i class="fa fa-plus-circle"></i> Form Add Invite
                        </div>
                    </div>
                    
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal" method="post" id="formInput" name="formInput">
                        <input type="hidden" name="id" id="id">
                            <div class="form-body">
                                <h4 class="form-section">Data Family</h4>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-5">
                                        <div class="input-group" style="text-align:left">
                                            <input type="text" class="form-control" name="name" id="name" autocomplete="off">
                                            <span class="input-group-btn">
                                                <a data-toggle="modal" data-target="#tableFamily" class="btn btn-success" id="btn-search">
                                                <i class="fa fa-search"></i> Search
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">Gender</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="gender" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="address" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label">Phone</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="phone" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <h4 class="form-section">Data Invitation</h4>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Barcode ID</label>
                                    <div class="col-md-3">
                                        <div class="input-icon right"><i class="fa"></i>
                                            <input type="text" class="form-control" placeholder="Input Barcode ID" name="barcode" id="barcode" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Table Name</label>
                                    <div class="col-md-3">
                                        <div class="input-icon right"><i class="fa"></i>
                                            <select class="form-control" name="lstTable" id="lstTable">
                                                <option value="">- Choose -</option>
                                                <?php foreach($listTable as $r) { ?>
                                                <option value="<?=$r->table_id;?>"><?=$r->table_name;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Number</label>
                                    <div class="col-md-3">
                                        <div class="input-icon right"><i class="fa"></i>
                                            <input type="text" class="form-control" placeholder="0" name="number" id="number" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Save</button>
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
function resetformInput() {
    $("#id").val('');
    $("#name").val('');
    $("#gender").val('');
    $("#address").val('');
    $("#phone").val('');
    $("#barcode").val('');
    $("#lstTable").val('');
    $("#number").val('');
    $("#name").focus();

    var MValid = $("#formInput");
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
            name: { required: true },
            barcode: { required: true, number: true, 
                remote: {
                    url: "<?=site_url('admin/invite/register_code_exists');?>",
                    type: "post",
                    data: {
                        barcode: function() {
                            return $("#barcode").val();
                        }
                    }
                }
            },
            lstTable: { required: true },
            number: { required: true, number: true }
        },
        messages: { 
            name: { required :'Name required' },
            barcode: {
                required:'Barcode ID required', number:'Barcode ID Only Number',
                remote: 'Barcode ID exist, cannot use'
            },
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
                url: "<?=site_url('admin/invite/savedata'); ?>",
                type: "POST",
                data: dataString,
                success: function(data) {
                    reload_table();
                    resetformInput();
                    swal({
                        title:"Success",
                        text: "Save Data Success",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Save Data');
                }
            });
        }
    });
});

function reload_table() {
    table.ajax.reload(null,false);
}

var table;
$(document).ready(function() {
    table = $('#tableData').DataTable({ 
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "lengthMenu": [
                [15, 30, 50, 75, 100, -1],
                [15, 30, 50, 75, 100, "All"]
        ],
        "pageLength": 15,
        "ajax": {
            "url": "<?=site_url('admin/invite/data_family_list')?>",
            "type": "POST"
        },
        "columnDefs": [
        { 
            "targets": [ 0, 1 ],
            "orderable": false,
        },
        ],
    }); 
});

$(function() {
    $(document).on("click",'.pilihData', function(e) {
        var id          = $(this).data('id');
        var name        = $(this).data('name');
        var gender      = $(this).data('gender');
        var address     = $(this).data('address');
        var phone       = $(this).data('phone');
        
        $("#id").val(id);
        $("#name").val(name);
        $("#gender").val(gender);
        $("#address").val(address);
        $("#phone").val(phone);

        $('#tableFamily').modal('hide');
    })
});
</script>

<div class="modal fade" id="tableFamily" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-list"></i> Data All Family</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover" id="tableData" width="100%">
                    <thead>
                        <tr>
                            <th width="5%"></th>
                            <th width="5%">No</th>
                            <th width="20%">Name</th>
                            <th width="10%">Gender</th>
                            <th width="50%">Address</th>
                            <th width="10%">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>