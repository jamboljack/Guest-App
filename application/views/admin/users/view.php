<div class="modal" id="filterData" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" id="form-filter" class="form-horizontal">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Filter Data</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-4 control-label">Level</label>
                    <div class="col-md-8">
                        <select class="form-control" name="lstLevel" id="lstLevel">
                            <option value="">- ALL -</option>
                            <option value="Admin">Admin</option>
                            <option value="Operator">Operator</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Status</label>
                    <div class="col-md-8">
                        <select class="form-control" name="lstStatus" id="lstStatus">
                            <option value="">- ALL -</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="btn-filter"><i class="fa fa-search"></i> Filter</button>
                <button type="button" class="btn btn-default" id="btn-reset"><i class="fa fa-refresh"></i> Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">Users</h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?=site_url('admin/home');?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Users & Member</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Users</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height red-thunderbird">
                    <i class="icon-calendar">&nbsp; </i><span class="uppercase visible-lg-inline-block"><?=tgl_indo(date('Y-m-d'));?></span>
                </div>
            </div>
        </div>

        <a href="<?=site_url('admin/users/adddata');?>">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Data</button>
        </a>
        <a data-toggle="modal" data-target="#filterData">
            <button type="button" class="btn btn-warning"><i class="fa fa-search"></i> Filter Data</button>
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box red-thunderbird">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Users List
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover" id="tableData">
                        <thead>
                            <tr>
                                <th width="5%"></th>
                                <th width="5%">No</th>
                                <th width="10%">Username</th>
                                <th>Name</th>
                                <th width="15%">Department</th>
                                <th width="10%">Mobile No.</th>
                                <th width="20%">Email</th>
                                <th width="7%">Level</th>
                                <th width="5%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript" src="<?=base_url();?>backend/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>backend/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script type="text/javascript">
var table;
$(document).ready(function() {
    table = $('#tableData').DataTable({
        "info": false,
        "searching": false,
        "paging": false,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('admin/users/data_list')?>",
            "type": "POST",
            "data": function(data) {
                data.lstLevel       = $('#lstLevel').val();
                data.lstStatus      = $('#lstStatus').val();
            }
        },
        "columnDefs": [
        {
            "targets": [ 0, 1 ],
            "orderable": false,
        },
        ],
    });

    $('#btn-filter').click(function() {
        table.ajax.reload();
        $('#filterData').modal('hide');
    });

    $('#btn-reset').click(function() {
        $('#form-filter')[0].reset();
        table.ajax.reload();
        $('#filterData').modal('hide');
    });
});
</script>