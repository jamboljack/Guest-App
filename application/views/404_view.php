<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>404 Not Found</title>
        <link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
        <style type="text/css">
            body{padding: 0px;margin: 0px;}
            .error {
                width: 100%;
                height: 100%;
                margin: 0px;
                padding: 0px;
            }
            .error-content {
                width: 400px;
                height: 200px;
                position: relative;
                top: 40%;
                margin-right: auto;
                margin-left: auto;
                text-align: center;
                margin-top: 100px;
            }
        </style>
        <link href="<?=base_url();?>backend/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?=base_url();?>backend/assets/global/plugins/animate/animate.min.css">
    </head>
    <body>
        <div class="error-container">
            <div class="error-content bounceIn animated">
                <img width="100%" src="<?=base_url('img/error.jpg');?>">
                <p class="error-text">
                    <a class="error-button" href="javascript:history.back(-1)">Kembali</a>
                </p>
            </div>
        </div>
        <script src="<?=base_url();?>backend/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>backend/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
