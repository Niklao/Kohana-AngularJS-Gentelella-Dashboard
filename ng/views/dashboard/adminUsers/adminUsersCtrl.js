angular.module('dashboard.adminUsersCtrl', ['ui.router'])
.controller('AdminUsersCtrl', function($scope,httpManager) {
    gentellaInitiata();
    
    $scope.addAdminUser = function(){
        $('#addAdmin').modal('show');
        init_SmartWizard();
    };

    $scope.addAdminUserS1Callback = function (response){
        alert(JSON.stringify(response));
    };

    $scope.addAdminUserS1 = function(){
        httpManager.postRequester('addAdminUsers',{},$scope.addAdminUserS1Callback);
    };
});