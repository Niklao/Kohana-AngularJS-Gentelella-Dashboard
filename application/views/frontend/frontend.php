<!DOCTYPE html>
<html class="no-js" lang="en">
    <meta charset="utf-8" />
    <title>AngularJS-Foundation-Boilerplate</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <script src="ng/libs/Angular-1.2.32/angular.min.js"></script>

    <script src="ng/libs/Angular-Ui-Router-0.2.8/angular-ui-router.min.js"></script>

    <script src="ng/app.js"></script>
    
    <script src="ng/views/home/homeCtrl.js"></script>

    <script src="ng/views/common/jhead/jHeadCtrl.js"></script>
    
    <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    
    <script src="ng/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="ng/node_modules/foundation-sites/dist/js/foundation.min.js"></script>
    
    <!--Get Latest-->

    <body>
        <div ng-app="starter" >
            <div ui-view="jhead">
            </div>
            
        </div>
    </body>
</html>