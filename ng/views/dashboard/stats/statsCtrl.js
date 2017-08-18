angular.module('dashboard.statsCtrl', ['ui.router'])
.controller('StatsCtrl', function($scope) {
    gentellaInitiata();
    $scope.testMessage = function(){
        $('#addAdmin').modal('show');
        init_SmartWizard();
    }
});