<?php
$meta = $this->menu_m->select_meta()->row();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title><?=$meta->meta_name;?></title>
<link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>
<link href="<?=base_url();?>backend/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>backend/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>backend/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>backend/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>backend/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>backend/assets/global/plugins/jquery-tags-input/jquery.tagsinput.css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>backend/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link href="<?=base_url();?>backend/assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>backend/assets/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>backend/assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>backend/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>backend/assets/admin/layout2/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url();?>backend/assets/admin/layout2/css/themes/dark.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=base_url();?>backend/assets/admin/layout2/css/custom.css" rel="stylesheet" type="text/css"/>
<script src="<?=base_url();?>backend/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
</head>
<body class="page-md page-header-fixed page-container-bg-solid page-sidebar-fixed page-sidebar-closed-hide-logo page-header-fixed-mobile page-footer-fixed1">
<?=$_header;?>
<div class="clearfix"></div>
<div class="page-container">
	<?=$_sidebar;?>
	<?=$content;?>
</div>
<?=$_footer;?>
<script src="<?=base_url();?>backend/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/global/plugins/select2/select2.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=base_url();?>backend/assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    Metronic.init();
    Layout.init();
});

$('.date-picker').datepicker({
    rtl: Metronic.isRTL(),
    format: 'dd-mm-yyyy',
    orientation: "left",
    autoclose: true
});
</script>
</body>
</html>