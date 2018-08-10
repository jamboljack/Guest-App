<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">Dashboard</h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?=site_url('admin/home');?>">Dashboard</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height red-thunderbird">
                    <i class="icon-calendar">&nbsp; </i><span class="uppercase visible-lg-inline-block"><?=tgl_indo(date('Y-m-d'));?></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-light blue-soft" href="<?=site_url('admin/family');?>">
                    <div class="visual">
                        <i class="icon-users"></i>
                    </div>
                    <div class="details">
                        <div class="number"><?=number_format($family->total, 0, '', '');?></div>
                        <div class="desc">Total Family</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-light purple-soft" href="<?=site_url('admin/invite');?>">
                    <div class="visual">
                        <i class="icon-envelope"></i>
                    </div>
                    <div class="details">
                        <div class="number"><?=number_format($invite->total, 0, '', '');?></div>
                        <div class="desc">Total Invite</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-light red-soft" href="<?=site_url('admin/table');?>">
                    <div class="visual">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number"><?=number_format($kursi->total, 0, '', '');?></div>
                        <div class="desc">Total Person</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-light green-soft" href="<?=site_url('admin/arrive');?>">
                    <div class="visual">
                        <i class="fa fa-exchange"></i>
                    </div>
                    <div class="details">
                        <div class="number"><?=number_format($arrive->total, 0, '', '.');?></div>
                        <div class="desc">Total Arrive</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-sharp hide"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Chair Information</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <a onclick="reload_table()" class="btn btn-danger"><i class="fa fa-refresh"></i> Refresh</a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover" id="tableData">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Meja</th>
                                    <th width="10%">Jumlah Undangan</th>
                                    <th width="10%">Jumlah Scan</th>
                                    <th width="10%">Jumlah Kursi</th>
                                    <th width="10%">Jumlah Datang</th>
                                    <th width="10%">Sisa</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <br />
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
        "paging" : false,
        "info" : false,
        "searching" : false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('admin/home/data_list');?>",
            "type": "POST"
        },
        "columnDefs": [
        {
            "targets": [ 0,2,3,4,5,6],
            "orderable": false,
        },
        ],
    });
});

function reload_table() {
    table.ajax.reload(null,false);
}
</script>