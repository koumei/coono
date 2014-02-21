
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Koumei">

    <title><?php echo $my_title;?></title>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="<?php echo base_url();?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Bootstrap core JavaScript
   ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>

<body>



<div class="container">
    <!-- Example row of columns -->

    <?php if(!empty($loginbar)):?>
    <div class="loginbar">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php if($logged_in){
                echo $loginbar;
            }?>
            </div>
        </div>
    </div>
    <?php endif;?>
    <div class="row">
        <div class="col-md-12">
            <?php echo $my_content; ?>
        </div>
    </div>

    <hr>

    <footer class="text-center">
        <p>&copy; Coono 2014</p>
    </footer>
</div> <!-- /container -->



</body>
</html>

