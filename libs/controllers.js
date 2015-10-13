//MAIN CTRL //**OK
app.controller('main', ['$scope', '$rootScope', '$location', 'ngDialog', 'CartService', '$localStorage', '$window', '$http', 'ProductService', function ($scope, $rootScope, $location, ngDialog, CartService, $localStorage, $window, $http, ProductService){

    //LOADER
    $rootScope.isLoad = false;

    // SCROLL TO FUNCTION
    $scope.scrollTo = function(pixel){
        angular.element('body').animate({scrollTop:pixel});
    };

    // IS SINGLE FUNCTION
    $scope.isSingle = false;
    if($location.path() === '/shop/product/'){
        $scope.isSingle = true;
    }

    // LOGIN AUTH
    if(localStorage.getItem('user') != null)
        $rootScope.auth = true;
    else{
        $rootScope.auth = false;
    }

    //LOG OUT
    $scope.logOut = function(){
        $location.path('/');
        localStorage.removeItem('user');
        $rootScope.auth = false;
        CartService.clearCart();
    };

    $rootScope.closeDialog = function(){
        ngDialog.closeAll();
    };

    //CHANGE LANG
    $scope.switchLanguage = function (key){
        $translate.uses(key);
    };

    //PRINT PAGE
    $scope.printPage = function(name) {
        var printContents = document.getElementById(name).innerHTML;
        var popupWin = window.open('', '_blank', 'width=800,height=600');
        popupWin.document.open()
        popupWin.document.write('<html><head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/><link rel="stylesheet" href="css/style.css"/><link rel="stylesheet" href="fonts/font.css"/></head><body onload="window.print()">' + printContents + '</html>');
        popupWin.document.close();
    } 

    // CART SERVICE******************************************
    //INITIALIZE ALL DATA
    //GET DISCOUNT CODE
    $scope.displayDiscountCode = CartService.getDiscountCode();
    //GET DISCOUNT PERCENT
    $scope.displayDiscountPercent = CartService.getDiscountPercent();
    //GET SUBTOTAL
    $scope.subTotal = CartService.getSubTotal();
    //GET TOTAL
    $rootScope.totalCart = CartService.getTotalCart();
    //GET CART ITEMS
    $rootScope.cartItems = CartService.getCart();
    //GET TAX
    $scope.displayTax = CartService.getTax();
    //GET FINAL TOTAL
    $rootScope.displayFinalTotal = CartService.getFinalTotal();
    //GET COUNT ITEMS ON CART
    $rootScope.getCountCart = CartService.countCart();

    //LOCALSTORAGE DATA INITIALIZE***************************//**OK
    if(localStorage.getItem('user') != null){

        //RETRIEVE USER DATA LOCALSTORAGE (ROOT)
        $rootScope.user = JSON.parse(atob(localStorage.getItem('user')))[0];
        //USER ID
        $rootScope.userID = $rootScope.user.id;
        //USER LOGIN
        $rootScope.userLogin = $rootScope.user.login;
        //USER NAME
        $rootScope.userName = $rootScope.user.name;
        //COUNTRY
        $rootScope.userCountry = $rootScope.user.country;

    }
    if (localStorage.getItem('cart') != null){

        //RETRIEVE CART DATA LOCALSTORAGE (ROOT)
        $rootScope.cart = JSON.parse(atob(localStorage.getItem('cart')))[0];

    }

    //ADD ITEM //**OK
    $scope.addCart = function(id, name, edition, img, price){
        //CALL ADD SERVICE
        CartService.addToCart(id, name, edition, img, price);
        //RESFRESH TOTAL
        $rootScope.totalCart = CartService.getTotalCart();
        //REFRESH SUBTOTAL
        $scope.subTotal = CartService.getSubTotal();
        //REFRESH FINAL TOTAL
        $rootScope.displayFinalTotal = CartService.getFinalTotal();
        //RESFRESH TAX
        $scope.displayTax = CartService.getTax();
        //REFRESH COUNTER
        $rootScope.getCountCart = CartService.countCart();
        //REFRESH ALL
        $rootScope.cart = JSON.parse(atob(localStorage.getItem('cart')))[0];
    };
    //DELETE ITEM //**OK
    $scope.deleteCartItem = function (index){
        //CALL DELETE SERVICE
        CartService.deleteItem(index);
        //REFRESH TOTAL
        $rootScope.totalCart = CartService.getTotalCart();
        //REFRESH SUBTOTAL
        $scope.subTotal = CartService.getSubTotal();
        //REFRESH FINAL TOTAL
        $rootScope.displayFinalTotal = CartService.getFinalTotal();
        //RESFRESH TAX
        $scope.displayTax = CartService.getTax();
        //REFRESH COUNTER
        $rootScope.getCountCart = CartService.countCart();
    };
    //UPDATE ITEM //**OK
    $scope.updateProduct = function (index, quantity, price){
        //CALL UPDATE SERVICE
        CartService.updateItem(index, quantity, price);
        //RESFRESH TOTAL
        $rootScope.totalCart = CartService.getTotalCart();
        //REFRESH SUBTOTAL
        $scope.subTotal = CartService.getSubTotal();
        //REFRESH FINAL TOTAL
        $rootScope.displayFinalTotal = CartService.getFinalTotal();
        //REFRESH TAX
        $scope.displayTax = CartService.getTax();
        //REFRESH COUNTER
        $rootScope.getCountCart = CartService.countCart();
    };
    //ADD DISCOUNT CODE //**SEE YOU SOON
    $scope.addDiscountCode = function (code){
        if(code){
            //CALL DISCOUNT SERVICE
            CartService.verifyDiscountCode('process/discount_code.php', 'discount-code', code).then(function (res){
                //RESPONSE
                $scope.resDiscount = res.msg;
                //ADD DISCOUNT CODE
                $scope.displayDiscountCode = CartService.getDiscountCode();
                //ADD DISCOUNT PERCENT
                $scope.displayDiscountPercent = CartService.getDiscountPercent();
                //REFRESH FINAL TOTAL
                $rootScope.displayFinalTotal = CartService.getFinalTotal();
                //REFRESH TAX
                $scope.displayTax = CartService.getTax();
            });
        }else{
            $scope.resDiscount = 'Please fill the field';
        }
    };

    //ENVOIMOINCHER API (ROOT)
    //GET ALL COUNTRY
    $http.get('process/envoimoinscher/get_country_list.php').success(function (data){
        $rootScope.countryList = data;
        // console.log(data);
    });

    // GET ALL PRODUCT
    ProductService.getAll('process/product-view.php').then(function (data){
        $scope.products = data;
        // console.log(data);
    });

    //DISCOVER MOVIE
    $scope.discover = function (){
        ngDialog.open({
            template: 'partials/discover.php',
            className: 'ngdialog-discover'
        });
    };

    // var vid = angular.element('#discover');
    // vid.bind('ended', function (){
    //     ngDialog.closeAll();
    // });


}]);

//PRODUCT ALL CTRL //**OK
app.controller('shop', ['$scope', '$http', 'ProductService', function ($scope, $http, ProductService){

    //NOTHING

}]);

app.controller('product', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http){

    // PRODUCT VIEW TEMPLATES
    $scope.templatesProduct = [
        {name: 'Features', url: 'partials/product/feature.php'},
        {name: 'Design', url: 'partials/product/design.php'},
        // {name: 'App', url: 'partials/product/app.php'},
        {name: 'Specs', url: 'partials/product/specification.php'},
    ];

    $scope.selectedTemplate = $scope.templatesProduct[2].url;

    $scope.selectTemplate=function(template){
        $scope.selectedTemplate = template.url;
        $scope.scrollTo(0);
    };
    
    $scope.isActive = function(template) {
        return $scope.selectedTemplate === template.url;
    };

}]);

//PRODUCT ITEM CTRL//**OK
app.controller('single-item', ['$scope', '$routeParams', 'ProductService', '$http', function ($scope, $routeParams, ProductService, $http){

    //GET PRODUCT DETAIL
    ProductService.getItem('process/detail-view.php', $routeParams.item).then(function (data){
        $scope.product = data;

        //IMG BANK
        $http.get('process/get-picture-item.php', {params:{'id': $scope.product.id_product}}).success(function (data){
            $scope.photos = data;
        });

        // INITIAL INDEX
        $scope._Index = 0;

        //ACTIVE INDEX
        $scope.isActive = function (index){
          return $scope._Index === index;
        };

        //SHOW PREV
        $scope.showPrev = function () {
          $scope._Index = ($scope._Index > 0) ? --$scope._Index : $scope.photos.length - 1;
        };

        //SHOW NEXT
        $scope.showNext = function () {
          $scope._Index = ($scope._Index < $scope.photos.length - 1) ? ++$scope._Index : 0;
        };

        //SHOW ONCLICK LIST
        $scope.showPhoto = function (index) {
          $scope._Index = index;
        };
    });

}]);

//CONTACT CTRL //**OK
app.controller('contact', ['$scope', '$http', function ($scope, $http){

    //CONTACT ARRAY
    $scope.contactForm = {};

    //CONTACT SEND
    $scope.submitForm = function() {
        $http({
            method : 'POST',
            url : 'process/contactForm.php',
            data : $scope.contactForm,
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
        })
        .success(function(data) {
            $scope.resContact = data;
        });
    };

}]);

//NEWSLETTER CTRL //**OK
app.controller('newsletter', ['$scope', '$http', function ($scope, $http){

    // NEWSLETTER FORM
    $scope.mail = " ";

    $scope.newsletter = function(){
        $http({
            method : 'POST',
            url : 'process/newsletter.php',
            data : {"mail" : $scope.mail},
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
        })
        .success(function(data){
            $scope.res = data;
        }).error(function(data){
            console.log(data);
        });
    }

}]);

//MENU CTRL //**OK
app.controller('menu', ['$scope', '$http', '$window', '$location', function ($scope, $http, $window, $location){

    // CHANGE MENU ON SCROLL
    $window.onscroll = function(){
        $scope.scrollPos = document.body.scrollTop;
        var st = $scope.scrollPos;
        var transform = (0 + st/2);
        $scope.$apply();
    };

    //CURRENT ROUTE FOR ACTIVE CLASS
    $scope.isActive = function (viewLocation) {
        var active = (viewLocation === $location.path());
        return active;
    };

}]);

//CART CTRL //**OK
app.controller('cart', ['$scope', '$rootScope', '$localStorage', 'ngDialog', '$http', 'CartService', function ($scope, $rootScope, $localStorage, ngDialog, $http, CartService){

    //CART VIEW TEMPLATES
    $scope.templatesCart = [
        {name: 'shopping cart', url: 'partials/cart/shopping-cart.php'},
        {name: 'address & payment', url: 'partials/cart/shopping-address.php'},
        {name: 'delivery', url: 'partials/cart/shopping-delivery.php'},
        {name: 'payment', url: 'partials/cart/shopping-payment.php'},
        {name: 'review', url: 'partials/cart/shopping-review.php'},
    ];

    //DEFAULT SELECTED CART TEMPLATE
    $scope.selectedTemplate = $scope.templatesCart[0].url;

    //SELECT TEMPLATE
    $scope.selectTemplate=function(template){
        angular.element('body').animate({scrollTop:430});
        $scope.selectedTemplate = template.url;
    };

    //ACTIVE TEMPLATE
    $scope.isActive = function(template) {
        return $scope.selectedTemplate === template.url;
    };

    //START ORDER
    $scope.orderNow = function(){
        if($rootScope.auth == true && $rootScope.cartItems.length > 0){
            $scope.selectedTemplate = $scope.templatesCart[1].url;
        }else if(!$rootScope.cartItems.length > 0){
            ngDialog.open({
                template: '<h4>Sorry</h4><p>Your cart is empty, you must have at least one product to proceed with a purchase</p>',
                plain: true
            });
        }else{
            $rootScope.login();
        }
    };

    //IF USER AUTH
    if(localStorage.getItem('user') != null){

        //ORDER ARRAY
        $scope.orderForm = {};

        //ENVOIMOINCHER API
        //GET ALL OFFERS
        $scope.generateOffer = function (billing, product){
            $rootScope.isLoad = true;
            //FREE SHIPPING FOR FR USER
            if($rootScope.userCountry != 'FR'){
                $http.get('process/envoimoinscher/getDelivery.php', {params:{'billing':billing, 'product':JSON.stringify(product)}}).success(function (data){
                    $rootScope.deliveries = data;
                    $rootScope.isLoad = false;
                    $scope.selectTemplate($scope.templatesCart[2]);
                    // console.log(data);
                });
            }else{
                $scope.selectTemplate($scope.templatesCart[3]);
            }
        }

        //USER ADDRESS INFORMATIONS
        $scope.cartReview = function(){
            if($scope.orderForm.$valid){
                angular.element('body').animate({scrollTop:430});
                $scope.selectedTemplate = $scope.templatesCart[4].url;
            }else{
                ngDialog.open({
                    template: '<h4>Sorry</h4><p>You have not filled in the required fields (<span class="label-required">*</span>)</p>',
                    plain: true
                });
            }
        };
        //START PAYMENT
        $scope.payCart = function() {
            if($scope.orderForm){
                $rootScope.isLoad = true;
                $scope.orderForm.total = $rootScope.displayFinalTotal;
                $scope.orderForm.user = $rootScope.user;
                $scope.orderForm.contentCart = $rootScope.cartItems;

                $http({
                    method : 'POST',
                    url : 'process/payment.php',
                    data : $scope.orderForm,
                    headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
                })
                .success(function(data) {
                    $scope.cartRes = data;
                    CartService.clearCart();
                    CartService.clearDiscount();
                });
                // alert('send bank');
            }
        };

        //USE ACCOUNT ADDRESS FOR BILLING
        $scope.useCustomBilling = false;

        $scope.useAccountForBilling = function(){
            $scope.useCustomBilling = false;
            $http.get('process/use-account-address.php', {params:{'userID': $rootScope.userID}}).success(function (res){
                $scope.orderForm.billing = res;

            });

        };

        $scope.useAccountForBilling();

        $scope.useCustomForBilling = function(){
            $scope.useCustomBilling = true;
            delete $scope.orderForm.billing;
        };

        //USE ACCOUNT ADDRESS FOR SHIPPING
        $scope.useCustomShipping = false;

        $scope.useAccountForShipping = function(){
            $scope.useCustomShipping = false;
            $http.get('process/use-account-address.php', {params:{'userID': $rootScope.userID}}).success(function (res){

                $scope.orderForm.shipping = res;

            });

        };

        $scope.useAccountForShipping();

        $scope.useCustomForShipping = function(){
            $scope.useCustomShipping = true;
            delete $scope.orderForm.shipping;
        };

    }

}]);

//LOGIN CTRL //**OK
app.controller('login', ['$scope', '$rootScope', '$http', '$localStorage', 'ngDialog', '$location', 'CartService', '$timeout', function ($scope, $rootScope, $http, $localStorage, ngDialog, $location, CartService, $timeout){

    // LOGIN MODAL
    $rootScope.login = function(){
        ngDialog.open({
            template: 'partials/login.php',
            controller: 'login',
            className: 'ngdialog-login'
        });
    };

    //TEMPLATES LOGIN MODAL
    $scope.templatesLogin = [
        {name: 'login', url: 'partials/login/loginForm.php'},
        {name: 'register', url: 'partials/login/registerForm.php'},
        {name: 'forgot-password', url: 'partials/login/forgotPassword.php'},
    ];

    //DEFAULT SELECTED LOGIN MODAL TEMPLATE
    $scope.selectedTemplate = $scope.templatesLogin[0].url;

    //SELECT TEMPLATE
    $scope.selectTemplate = function(template){
        $scope.selectedTemplate = template.url;
    };

    //GET ALL COUNTRIES
    $http.get('process/login/get-all-country.php').success(function (data){
        $scope.countries = data;
    });

    //REGISTER ARRAY
    $scope.registerForm = {};

    //REGISTER ACCESS
    $scope.submitRegister = function (){
        $rootScope.isLoad = true;
        $http({
            method: 'POST',
            url: 'process/login/registerForm.php',
            data: $scope.registerForm,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
        .success(function (data){
            $rootScope.isLoad = false;
            if(data == 1){

                return $scope.resRegister = 'Register successful';

                $timeout(function (){

                    $scope.selectTemplate(templatesLogin[0]);

                }, 1000);

            }else if(data == 2){

                return $scope.resRegister = 'Passwords do not match';

            }else if(data == 3){

                return $scope.resRegister = 'Please fill required fields';

            }else{

                return $scope.resRegister = 'This user already exists';

            }

        });
    };

    //LOGIN ARRAY
    $scope.loginForm = {};

    //LOGIN ACCESS
    $scope.submitLogin = function() {
        $rootScope.isLoad = true;
        $http({
            method : 'POST',
            url : 'process/login/loginForm.php',
            data : $scope.loginForm,
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
        })
        .success(function(data) {
            $scope.user = data.login;
            $scope.id = data.id;
            $scope.name = data.name;
            $scope.country = data.country;
            $rootScope.auth = data.auth;

            if($rootScope.auth === true){

                var user = [{
                    'login'   : $scope.user,
                    'id'      : $scope.id,
                    'name'    : $scope.name, 
                    'country' : $scope.country,
                    'auth'    : $scope.auth,
                }];

                localStorage.setItem('user', btoa(JSON.stringify(user)));

                if(localStorage.getItem('user') != null){

                    //RETRIEVE USER DATA LOCALSTORAGE (ROOT)
                    $rootScope.user = JSON.parse(atob(localStorage.getItem('user')))[0];
                    //USER ID
                    $rootScope.userID = $rootScope.user.id;
                    //USER LOGIN
                    $rootScope.userLogin = $rootScope.user.login;
                    //USER NAME
                    $rootScope.userName = $rootScope.user.name;
                    //COUNTRY
                    $rootScope.userCountry = $rootScope.user.country;

                    ngDialog.closeAll();
                    $location.path('/account');
                    $timeout(function(){
                        $rootScope.isLoad = false;
                    }, 2000);
                }

            }else{

                return $scope.resLogin = 'You are not connected';

            }
        });
    };

    //FORGOT ARRAY
    $scope.forgotForm = {};

    //FORGOT PASSWORD
    $scope.submitForgotPassword = function (){
        $http({
            method: 'POST',
            url: 'process/login/forgotPassword.php',
            data: $scope.forgotForm,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
        .success(function (data){

            if(data == 1){

                return $scope.resForgotPassword = 'Email has been sent';

                $timeout(function (){

                    selectTemplate(templatesLogin[0]);

                }, 1000);

            }else{

                return $scope.resForgotPassword = 'Email has not been sent';

            }

        });
    };

}]);

//ACCOUNT CTRL //**OK
app.controller('account', ['$scope', '$rootScope', '$localStorage', '$http', 'ngDialog', function ($scope, $rootScope, $localStorage, $http, ngDialog){

    // ACCOUNT VIEW TEMPLATES
    $scope.templatesCart = [
        {name: 'Order', url: 'partials/account/order.php'},
        {name: 'Informations', url: 'partials/account/informations.php'}
    ];

    $scope.selectedTemplate = $scope.templatesCart[0].url;

    $scope.selectTemplate=function(template){
        $scope.selectedTemplate = template.url;
    };
    
    $scope.isActive = function(template) {
        return $scope.selectedTemplate === template.url;
    };

    if(localStorage.getItem('user') != null){

        $http.get('process/order-tracking.php', {params:{'userID': $rootScope.userID}}).success(function (res){

            $scope.orderTrackings = res;

        });

        $http.get('process/order-history.php', {params:{'userID': $rootScope.userID}}).success(function (res){

            $scope.orderHistories = res;

        });

        $scope.orderDetail = function (id, data){

            var newScope = $scope.$new();
            newScope.order = data;
            newScope.userCountry = $rootScope.userCountry;

            $http.get('process/order-detail.php', {params:{'orderID': id}}).success(function (res){

                newScope.orderItems = res;

                ngDialog.open({
                    template: 'partials/account/orderDetail.php',
                    controller: 'account',
                    scope: newScope,
                    className: 'ngdialog-order'
                });

            });

        };

        $scope.getUserInformation = function(){

            $http.get('process/account-information.php', {params:{'userID': $rootScope.userID}}).success(function (res){

                $scope.info = res;

            });

        };
        $scope.getUserInformation();

        $scope.editAccount = function (name, value, display, type){
            var newScope = $scope.$new();
            newScope.name = name;
            newScope.value = value;
            newScope.display = display;
            newScope.type = type;

            var modal = ngDialog.open({
                template: 'partials/account/info-modify.php',
                controller: 'account',
                scope: newScope,
                className: 'ngdialog-info-modify'
            });

            modal.closePromise.then(function(res) {
                $scope.getUserInformation();
            });

        };

        $scope.updateAccount = function (name, value){

            $http.get('process/account-modify.php', {params:{'name': name, 'value': value, 'userID': $rootScope.userID}}).success(function (res){
                $scope.closeThisDialog();
            });

        };

    }

}]);

