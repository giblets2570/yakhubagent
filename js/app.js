var yakhubApp = angular.module('yakhubAgent',['ngRoute','ngStorage','yakhubControllers']);

yakhubApp.config(['$routeProvider',function(route){
	route.
		when('/login',{
			templateUrl:'partials/login.html',
			controller: 'authCtrl'
		}).
        when('/profile',{
            templateUrl: 'partials/profile.html',
            controller: 'profileCtrl'
        }).
		otherwise({
			redirectTo: '/login'
		});
}]);

yakhubApp.run(function ($rootScope, $location, $sessionStorage){
	$rootScope.$on("$routeChangeStart", function (event, next, current) {
        $rootScope.authenticated = false;
        if ($sessionStorage.username) {
            $rootScope.authenticated = true;
            $rootScope.username = $sessionStorage.username;
        } else {
            var nextUrl = next.$$route.originalPath;
            if (nextUrl == '/signup' || nextUrl == '/login') {

            } else {
                $location.path("/login");
            }
        }
    });
});

yakhubApp.factory("phoneFactory",['$http', function(http){

    factory = {};

    var postData = function(url,data,callback){
        http({
            method:'POST',
            url: url,
            data: data,
            cache: false
        }).success(callback);
    }

    factory.getNextNumber = function(data,callback){
        postData('endpoints/getNextNumber.php',data,callback);
    }

    factory.twilioSetup = function(data,callback){
        postData('endpoints/twilioSetup.php',data,callback);
    }

    return factory;
}]);



