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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="assets/images/logo_1.png" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Articles</a></li>
                        <li><a href="#">Tutorials</a></li>
                        <li><a href="#">Freebies</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Docs and Support</a></li>
                                <li><a href="#">Updates</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Information</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

            </div>
        </nav>

        <div id="body" class="container">
            <div class="col-lg-8" >
                <div class="content">

                    <!-- Posting Loops -->
                    <div class="posting">
                        <div class="panel panel-default post">
                            <div class="panel-heading" style="overflow: hidden; height: 300px;"><img class="img-post-feature" src="assets/images/prog-lang.jpg" width="100%" /></div>
                            <div class="panel-body">
                                <a href="#"><h2 class="lead">Programming Language V1.0</h2></a>

                                <div class="post-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                                </div>

                                <div class="pull-right"><a class="btn btn-default read-more">Read more</a></div>

                                <span class="label label-default">Published November 20, 2010 by Ahmad Awdiyanto </span>
                                <br />
                                <span class="small under-categories label label-info">
                                    <span class="category-titles">Categories :</span>
                                    <a href="#">PHP</a> <a href="#">JSP</a> <a href="#">.NET</a> 
                                    <a href="#">JavaScript</a> <a href="#">NodeJS</a>  
                                </span>
                                <br />
                                <span class="small with-tags label label-info">
                                    <span class="category-titles">Tags :</span>
                                    <a href="#">PHP</a> <a href="#">JSP</a> <a href="#">.NET</a> 
                                    <a href="#">JavaScript</a> <a href="#">NodeJS</a> 
                                </span>

                            </div>
                            <div class="panel-footer">

                                <div class="col-lg-5 panfoot">
                                    <?php
                                    $comment_author_email = 'dhidyawdiyan@yahoo.co.id';
                                    $gravatar_link = 'http://www.gravatar.com/avatar/' . md5($comment_author_email) . '?s=64';
                                    echo '<img class="graphoto" src="' . $gravatar_link . '" />';
                                    ?>              
                                    <div class="post-writer"><span class="ket-kecil">Creator : </span><br /><a href=""><strong>Awdiyan</strong></a></div></div>
                                <div class="col-lg-3 panfoot pull-right">

                                    <!-- AddToAny BEGIN -->
                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                        <a class="a2a_dd" href="http://www.addtoany.com/share_save"></a>
                                        <a class="a2a_button_facebook"></a>
                                        <a class="a2a_button_twitter"></a>
                                        <a class="a2a_button_google_plus"></a>
                                    </div>
                                    <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
                                    <!-- AddToAny END -->

                                </div>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                    <!-- END :: Posting Loops -->

                    <!-- Posting Loops -->
                    <div class="posting">
                        <div class="panel panel-default post">
                            <div class="panel-heading" style="overflow: hidden; height: 300px;"><img class="img-post-feature" src="assets/images/prog-lang.jpg" width="100%" /></div>
                            <div class="panel-body">
                                <a href="#"><h2 class="lead">Programming Language V1.0</h2></a>

                                <div class="post-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                                </div>

                                <div class="pull-right"><a class="btn btn-default read-more">Read more</a></div>

                                <span class="label label-default">Published November 20, 2010 by Ahmad Awdiyanto </span>
                                <br />
                                <span class="small under-categories label label-info">
                                    <span class="category-titles">Categories :</span>
                                    <a href="#">PHP</a> <a href="#">JSP</a> <a href="#">.NET</a> 
                                    <a href="#">JavaScript</a> <a href="#">NodeJS</a>  
                                </span>
                                <br />
                                <span class="small with-tags label label-info">
                                    <span class="category-titles">Tags :</span>
                                    <a href="#">PHP</a> <a href="#">JSP</a> <a href="#">.NET</a> 
                                    <a href="#">JavaScript</a> <a href="#">NodeJS</a> 
                                </span>

                            </div>
                            <div class="panel-footer">

                                <div class="col-lg-5 panfoot">
                                    <?php
                                    $comment_author_email = 'dhidyawdiyan@yahoo.co.id';
                                    $gravatar_link = 'http://www.gravatar.com/avatar/' . md5($comment_author_email) . '?s=64';
                                    echo '<img class="graphoto" src="' . $gravatar_link . '" />';
                                    ?>              
                                    <div class="post-writer"><span class="ket-kecil">Creator : </span><br /><a href=""><strong>Awdiyan</strong></a></div></div>
                                <div class="col-lg-3 panfoot pull-right">

                                    <!-- AddToAny BEGIN -->
                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                        <a class="a2a_dd" href="http://www.addtoany.com/share_save"></a>
                                        <a class="a2a_button_facebook"></a>
                                        <a class="a2a_button_twitter"></a>
                                        <a class="a2a_button_google_plus"></a>
                                    </div>
                                    <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
                                    <!-- AddToAny END -->

                                </div>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                    <!-- END :: Posting Loops -->
                  
                    <!-- Posting Loops -->
                    <div class="posting">
                        <div class="panel panel-default post">
                            <div class="panel-body">
                                <a href="#"><h2 class="lead">Programming Language V1.0</h2></a>

                                <div class="post-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                                </div>

                                <div class="pull-right"><a class="btn btn-default read-more">Read more</a></div>

                                <span class="label label-default">Published November 20, 2010 by Ahmad Awdiyanto </span>
                                <br />
                                <span class="small under-categories label label-info">
                                    <span class="category-titles">Categories :</span>
                                    <a href="#">PHP</a> <a href="#">JSP</a> <a href="#">.NET</a> 
                                    <a href="#">JavaScript</a> <a href="#">NodeJS</a>  
                                </span>
                                <br />
                                <span class="small with-tags label label-info">
                                    <span class="category-titles">Tags :</span>
                                    <a href="#">PHP</a> <a href="#">JSP</a> <a href="#">.NET</a> 
                                    <a href="#">JavaScript</a> <a href="#">NodeJS</a> 
                                </span>

                            </div>
                            <div class="panel-footer">

                                <div class="col-lg-5 panfoot">
                                    <?php
                                    $comment_author_email = 'dhidyawdiyan@yahoo.co.id';
                                    $gravatar_link = 'http://www.gravatar.com/avatar/' . md5($comment_author_email) . '?s=64';
                                    echo '<img class="graphoto" src="' . $gravatar_link . '" />';
                                    ?>              
                                    <div class="post-writer"><span class="ket-kecil">Creator : </span><br /><a href=""><strong>Awdiyan</strong></a></div></div>
                                <div class="col-lg-3 panfoot pull-right">

                                    <!-- AddToAny BEGIN -->
                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                        <a class="a2a_dd" href="http://www.addtoany.com/share_save"></a>
                                        <a class="a2a_button_facebook"></a>
                                        <a class="a2a_button_twitter"></a>
                                        <a class="a2a_button_google_plus"></a>
                                    </div>
                                    <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
                                    <!-- AddToAny END -->

                                </div>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                    <!-- END :: Posting Loops -->
                    

                </div>
            </div>
            <div class="col-lg-4" >

                    <div class="panel panel-default sidebar">
                        <div class="panel-heading">our sponsors</div>
                        <div class="panel-body">
                            ini sponsor ceritanya
                        </div>
                    </div>
            </div>
        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>