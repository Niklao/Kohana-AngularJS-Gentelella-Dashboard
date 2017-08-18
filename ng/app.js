var myapp = angular.module('dashboard', ['ui.router','dashboard.adminUsersCtrl','neo-httpManager'])
myapp.config(function($stateProvider, $urlRouterProvider){
    // var urlBase ='http://localhost/gentella';
    $urlRouterProvider.when('','/stats');    
    $urlRouterProvider.otherwise('/stats');
    
    $stateProvider
    .state('stats', {
        url: '/stats',
        templateUrl: 'ng/views/dashboard/stats/stats.html',
        controller: function($scope){
            // $scope.contacts = [{ id:0, name: "Alice" }, { id:1, name: "Bob" }];
            // $scope.testMessage = function(){
            //     alert('Yes');
            // }
            gentellaInitiata();
        }
    })
    .state('adminUsers', {
        url: '/adminUsers',
        templateUrl: 'ng/views/dashboard/adminUsers/adminUsers.html',        
        onEnter: function(){
            console.log("enter contacts.list");
        },
        controller:'AdminUsersCtrl'
    })
});