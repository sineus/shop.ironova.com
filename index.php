<html lang="en" ng-app="ironova" ng-cloak>
    <head>
        <base href="/">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>IRONOVA</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="og:title" content="">
        <meta property="og:type" content="website">
        <meta property="og:image" content="http://www.ironova.com/img/logo-black.svg">
        <meta property="og:site_name" content="IRONOVA">
        <meta itemprop="name" content="">
        <meta itemprop="description" content="">
        <link rel="icon" type="image/png" href="/img/favicon.png" />
        <meta itemprop="image" content="http://www.ironova.com/img/logo-black.svg"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>  
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="fonts/font.css"/>
    </head>
    <body ng-controller="main">
        <!--LOADER-->
        <div class="loader" ng-show="isLoad">
            <div class="loader-icon">
                <div class="icon"></div>
            </div>
        </div>
        <!--NAVBAR-->
        <div class="row fixed-navbar" ng-controller="menu" ng-class="{fix:scrollPos > 150}" class-route>
            <!--BRAND LOGO-->
            <a href="/">
                <div class="col-sm-2 brand-logo" ng-class="{fix: scrollPos > 150}" class-route></div>
            </a>
            <!--NAV-->
            <div class="col-sm-8 nav">
                <ul>
                    <li><a ng-class="{ active: isActive('/products') }" href="product">Products</a></li>
                    <li><a ng-class="{ active: isActive('/shop') }" href="shop">Shop</a></li>
                    <li><a ng-class="{ active: isActive('/news') }" href="news">News</a></li>
                    <li><a ng-class="{ active: isActive('/about') }" href="about">About</a></li>
                    <li><a ng-class="{ active: isActive('/contact') }" href="contact">Contact</a></li>
                    <li ng-if="!auth"><a ng-controller="login" class="login-btn" href="#" ng-click="login()">Login</a></li>
                    <li ng-if="auth"><a ng-controller="login" class="login-btn" href="account">Account</a></li>
                </ul>
            </div>
            <!--SHOP OPTIONS-->
            <div class="col-sm-2 nav-option" ng-class="{fix:scrollPos > 150}" class-route>
                <a class="option-btn cart" href="cart" ng-controller="cart"><span class="item-count" ng-show="getCountCart > 0">{{getCountCart}}</span></a>
                <a class="option-btn search" href=""></a>
                <a class="option-btn lang" href=""></a>
            </div>
        </div>
        <!--VIEW-->
        <div class="global-view" ng-view></div>
        <!--SCRIPT-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.4/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.4/angular-animate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.4/angular-route.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/ng-dialog/0.4.0/js/ngDialog.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate/2.7.2/angular-translate.min.js"></script>
        <script src="libs/ngStorage.min.js"></script>
        <script src="libs/app.js"></script>
        <script src="libs/controllers.js"></script>
        <script src="libs/service.js"></script>
        <script src="libs/directive.js"></script>
        <script src="libs/filter.js"></script>
    </body>
</html>