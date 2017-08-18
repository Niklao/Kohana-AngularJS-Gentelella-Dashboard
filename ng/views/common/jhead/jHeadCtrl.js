angular.module('jCommon.headCtrl', ['ui.router'])

.controller('jHead', function($scope) {
    $scope.$on('$viewContentLoaded', function() {
        $(document).foundation();
        alert('head');
    });

    $scope.showAlert = function (){
        alert('yo');
    };
});