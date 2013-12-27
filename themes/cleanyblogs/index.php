<!DOCTYPE html>
<html>
    <head>
        <title>Cleany Blogs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php echo $this->partial('partial/nav'); ?> 
        <div id="body" class="container">
            <div class="col-lg-8" >
                <div class="content">
                    
                        
                    <?php echo $this->content(); ?>
                    
                </div>
            </div>
            <div class="col-lg-4" >
                    <?php echo $this->partial('partial/sidebar'); ?> 
            </div>
        </div>
        <?php echo $this->partial('partial/footer'); ?> 

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>