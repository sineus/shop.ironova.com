//INITIALIZE APP
var app = angular.module('ironova', ['ngRoute', 'ngAnimate', 'ngDialog', 'ngStorage', 'pascalprecht.translate']);
//APP CONFIG (ROUTE, TRANSLATE, ETC)
app.config(['$routeProvider', '$locationProvider', '$translateProvider', function ($routeProvider, $locationProvider, $translateProvider){
    
    //INITIALIZE ROUTE APP
    $routeProvider
    .when('/', {
        templateUrl: 'partials/home.php',
        controller: 'main'
    })
    .when('/product', {
        templateUrl: 'partials/product.php',
        controller: 'product'
    })
    .when('/shop', {
        templateUrl: 'partials/shop.php',
        controller: 'shop'
    })
    .when('/shop/products/:item', {
        templateUrl: 'partials/item.php',
        controller: 'single-item',
        pageClass: 'single-menu'
    })
    .when('/cart', {
        templateUrl: 'partials/cart.php',
        controller: 'cart'
    })
    .when('/contact', {
        templateUrl: 'partials/contact.php',
        controller: 'contact'
    })
    .when('/account', {
        templateUrl: 'partials/account.php',
        controller: 'account',
        resolve: {
            'auth': function (AuthService){
                return AuthService.authenticate();
            }
        }
    })
    //CART RETURN
    .when('/error-cart', {
        templateUrl: 'partials/cart/error-cart.php',
        controller: 'main',
        resolve: {
            'auth': function (AuthService){
                return AuthService.authenticate();
            }
        }
    })
    .when('/success-cart', {
        templateUrl: 'partials/cart/success-cart.php',
        controller: 'main',
        resolve: {
            'auth': function (AuthService){
                return AuthService.authenticate();
            }
        }
    })
    .when('/return-cart', {
        templateUrl: 'process/cart/return.php',
        controller: 'main',
        resolve: {
            'auth': function (AuthService){
                return AuthService.authenticate();
            }
        }
    })
    // 404 RETURN
    .otherwise({
        redirectTo: '/'
    });

    //ENABLE HTML5 MODE FOR ROUTE (WITHOUT HASH URL)
    if(window.history && window.history.pushState) {
        $locationProvider.html5Mode(true);
    }


    //TRANSLATE APP
    var lang = window.navigator.userLanguage || window.navigator.language;

    // if(lang == 'fr'){
    //     $translateProvider.preferredLanguage('fr');
    // }else{
    //     $translateProvider.preferredLanguage('en');
    // }

    //TRANSLATE OPTIONS
    $translateProvider.preferredLanguage('en');
    $translateProvider.useLoader('customLoader', {});
    $translateProvider.useSanitizeValueStrategy('escaped');

}]);
//APP RUN (INITIALIZE VALUE IF APP START)
app.run(['$rootScope', '$location', function ($rootScope, $location) {
    //SCROLL TOP
    $rootScope.$on('$routeChangeSuccess', function (currentRoute, previousRoute) {

        angular.element('body').animate({scrollTop:0});

    });
    //REJECTION AUTH FALSE LOCATION PATH
    $rootScope.$on('$routeChangeError', function (event, current, previous, rejection){

        if(rejection === 'Not Authenticated'){

            $location.path('/');

        }

    });

}]);
//PUR JAVASCRIPT OR JQUERY
(function(){

    //MOBILE TOOLBAR BLOCK
    function hideURLbar() {
        if (window.location.hash.indexOf('#') == -1) {
            window.scrollTo(0, 1);
        }
    }
    if (navigator.userAgent.indexOf('iPhone') != -1 || navigator.userAgent.indexOf('Android') != -1) {
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);
    }

}());