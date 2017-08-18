<!DOCTYPE html>
<html lang="en" class="no-js" ng-app="dashboard">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <script src="ng/libs/Angular-1.2.32/angular.min.js"></script>
    <script src="ng/libs/Angular-Ui-Router-0.2.8/angular-ui-router.min.js"></script>
    <script src="ng/app.js"></script>
    <script src="ng/views/dashboard/adminUsers/adminUsersCtrl.js"></script>
    <script src="ng/customLibs/httpManager.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>
            <div class="clearfix">
            </div>
            <div ng-include="'ng/views/dashboard/common/menuProfileQuick.html'">
            </div>
            <br />
            <div ng-include="'ng/views/dashboard/common/sideBarMenu.html'">
            </div>
            <div ng-include="'ng/views/dashboard/common/menuFooterButtons.html'">
            </div>
          </div>
        </div>
        <div ng-include="'ng/views/dashboard/common/topNavigation.html'">
        </div>

        <div ui-view>
        </div>

        <div ng-include="'ng/views/dashboard/common/footerContent.html'">
        </div>
      </div>
    </div>
    

    <link href="gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="gentelella/build/css/custom.min.css" rel="stylesheet">

    <script src="gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <script src="gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="gentelella/vendors/fastclick/lib/fastclick.js"></script>
    <script src="gentelella/vendors/nprogress/nprogress.js"></script>
    <script src="gentelella/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <script src="gentelella/build/js/custom.js"></script>
  </body>
</html>
