<?php
$meta = $this->menu_m->select_meta()->row();
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <title><?=$meta->meta_name;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
    <link rel="stylesheet" type="text/css" id="theme" href="<?=base_url('backend/css/theme-default.css');?>"/>
</head>
<body>
<?=$content;?>
</body>
</html>