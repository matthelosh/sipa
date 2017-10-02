angular.module('spaRoute', ['ng-route'])
  .config(function($routeProvider, $locationProvider){
    .when('/pelanggan', {
      templateUrl: "pages/pelanggan.html",
      controller: "spaCtrl"
    });

    $locationProvider.html5Mode({
      enabled: true,
      requireBase: false
    });
  });
