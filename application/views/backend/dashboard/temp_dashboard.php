<!DOCTYPE html>
<html ng-app="dashboard" class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <title>
            AngularJS: UI-Router Abstract State Example
        </title>
        <meta name="format-detection" content="telephone=no" />
        <meta name="msapplication-tap-highlight" content="no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <script src="ng/libs/Angular-1.2.32/angular.min.js"></script>
        <script src="ng/libs/Angular-Ui-Router-0.2.8/angular-ui-router.min.js"></script>
        <script src="ng/app.js"></script>

        <link href="gentella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="gentella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="gentella/vendors/nprogress/nprogress.css" rel="stylesheet">
        <link href="gentella/build/css/custom.min.css" rel="stylesheet">

    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Scrap Junction</span></a>
                    </div>
        
                    <div class="clearfix"></div>
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2> sdfdssd</h2>
                            </div>
                            <div class="clearfix">
                            </div>
                        </div>
                        <br />
                        sidebarMenu
        
                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
            topNavigation
            pageContent
            footer
            </div>
        </div>

        <div ui-view>
        </div>

        <script src="gentella/vendors/jquery/dist/jquery.min.js"></script>
        <script src="gentella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="gentella/vendors/fastclick/lib/fastclick.js"></script>
        <script src="gentella/vendors/nprogress/nprogress.js"></script>
    
        <script src="gentella/build/js/custom.min.js"></script>
    </body>
</html>