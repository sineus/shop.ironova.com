//SERVICE
// PRODUCT E-COMMERCE SERVICE //**OK
app.factory('ProductService', function ($http){

    return {
        // DISPLAY ALL PRODUCTS //**OK
        getAll: function (url){

            return $http.get(url).then(function (res){

                return res.data;

            });

        },
        // DISPLAY SINGLE PRODUCT //**OK
        getItem: function (url, _name){

            return $http.get(url, {params:{"link_page": _name}}).then(function (res){

                return res.data;

            });

        },
    };

});

// CART E-COMMERCE SERVICE //**SEE YOU SOON
app.service('CartService', function ($localStorage, $http){

        // GLOBAL //**OK
        var cart, discount;

        // IF LOCALSTORAGE OBJECT EXIST
        if (localStorage.getItem('cart')) {

            var cartItems = JSON.parse(atob(localStorage.getItem('cart')));

        }else{
            // IF DOES NOT EXIST CREATE OBJECT
            cart = [];
            localStorage.setItem('cart', btoa(JSON.stringify(cart)));

        }

        // ADD TO CART ITEM //**OK
        this.addToCart = function (id, name, edition, img, price){

            //PRODUCT ARRAY
            var detail = {
                id: id,
                name: name,
                edition: edition,
                img: img,
                price: price,
                quantity: 1,
                total: price
            };

             //CHECK IF ID EXIST
            var isIndex = -1;

            if (localStorage.getItem('cart')) {
                for(var i = 0; i < cartItems.length; i++){

                    if(cartItems[i].id == id){
                        isIndex = i;
                        break;
                    }

                }
            }

            //IF EXIST ADD QUANTITY
            if(isIndex != -1){

                var quant = cartItems[isIndex].quantity += 1;
                cartItems[isIndex].total = price * quant;

            }else{
                //CRYPT AND PUSH
                cartItems.push(detail);

            }

            // ADD TO LOCALSTORAGE
            localStorage.setItem('cart', btoa(JSON.stringify(cartItems)));

        };

        // LIST ALL CART ITEMS //**OK
        this.getCart = function (){

            return cartItems;

        };

        // DELETE CART ITEM //**OK
        this.deleteItem = function (index){

            cartItems.splice(index, 1);
            localStorage.setItem('cart', btoa(JSON.stringify(cartItems)));

        };

        // DISPLAY TOTAL PRICE OF ITEM //**OK
        this.getTotal = function (index, price, quantity){

            return price * quantity;

        };

        // DISPLAY TOTAL PRICE OF CART //**OK
        this.getTotalCart = function (){

            //CALL CART ITEMS
            this.getCart();

            // INITIALIZE TOTAL
            var totalCart = 0;

            //INCREMENTS TOTAL OF ITEMS
            for(var key in cartItems){

                totalCart += parseFloat(cartItems[key].total);


            }
            return totalCart;

        };

        //COUNT QUANTITY //**OK
        this.countCart = function (){
            //CALL CART ITEMS
            this.getCart();

            //INITIALIZE TOTAL
            var total = 0;

            //LENGTH OF CART ITEMS
            var length = cartItems.length;

            //INCREMENTS ALL QUANTITY
            for(var key in cartItems){

                total += parseFloat(cartItems[key].quantity)-1;

            }

            //ADDITION TOTAL QUANTITY + LENGTH
            totalCount = (total + length);

            return totalCount;

        };

        // UPDATE PRICE AND QUANTITY OF ITEM //**OK
        this.updateItem = function (index, quantity, price){
            var sum = price * quantity;
            sum.toFixed(2);

            cartItems[index].quantity = quantity;
            cartItems[index].total = sum;

            localStorage.setItem('cart', btoa(JSON.stringify(cartItems)));
        };

        // CREATE AND VERIFY CART DISCOUNT CODE //**OK
        this.verifyDiscountCode = function (url, _name, code){
            return $http.get(url, {params:{"discount_code":code}}).then(function (res){

                if(code == res.data[1]){

                    discount = [{
                        code: code,
                        percent: res.data[5]
                    }];

                    localStorage.setItem(_name, btoa(JSON.stringify(discount)));

                    return {
                        msg: 'has been added successfully',
                        code: code,
                        percent: discount[0].percent
                    };

                }else{
                    return {
                        msg: res.data,
                        code: 'None',
                        percent: '0'
                    };

                }

            });

        };

        // GET DISCOUNT CODE //**OK
        this.getDiscountCode = function (){

            if(localStorage.getItem('discount-code') != null){

                return JSON.parse(atob(localStorage.getItem('discount-code')))[0].code;

            }else{

                return false;

            }

        };

        // GET DISCOUNT PERCENT //**OK
        this.getDiscountPercent = function (){
            
            if(localStorage.getItem('discount-code') != null){

                return JSON.parse(atob(localStorage.getItem('discount-code')))[0].percent;

            }else{

                return false;

            }

        };

        //GET SUBTOTAL //**SEE YOU SOON (ADD SHIPPING AMOUNT)
        this.getSubTotal = function(){

            var totalCart, shipping, percent, subTotal;

            totalCart = this.getTotalCart();
            // shipping = 8;

            if(localStorage.getItem('discount-code') != null){

                percent = this.getDiscountPercent();
                subTotal = totalCart - (totalCart * percent / 100);

            }else{

                subTotal = totalCart;

            }

            return subTotal;

        };

        //GET TAX //**SEE YOU SOON (ADD HTTP GET FOR RETRIEVE TAX ADMIN)
        this.getTax = function(){

            var subTotal, tax, taxAmount, ht;

            tax = 1.2;
            subTotal = this.getSubTotal();
            
            ht = subTotal / tax;
            taxAmount = subTotal - ht;


            return taxAmount;

        };

        //GET FINAL TOTAL //**OK
        this.getFinalTotal = function(){

            var subTotal, finalTotal;

            subTotal = this.getSubTotal();

            finalTotal = parseFloat(subTotal);

            return finalTotal;

        };

        //CLEAN CART //**OK
        this.clearCart = function(){

            cartItems.splice(0, cartItems.length);
            cart = [];
            localStorage.setItem('cart', btoa(JSON.stringify(cart)));

        };

        //CLEAN DISCOUNT //**OK
        this.clearDiscount = function(){

            localStorage.removeItem('discount-code');

        };
});

// AUTH PROTECT USER PAGE //**OK
app.factory('AuthService', function ($q, $rootScope){

    return {

        authenticate: function (){

            if($rootScope.auth){

                return true;

            }else{

                return $q.reject('Not Authenticated');

            }

        }

    };

});

// ASYNC LOAD LANGUAGE //**OK
app.factory('customLoader', function ($http, $q) {

    return function (options) {

        var deferred = $q.defer();
      
        $http({
            method:'GET',
            url:'lang/locale-' + options.key + '.json'
        }).success(function (data) {

            deferred.resolve(data);

        }).error(function () {

            deferred.reject(options.key);

        });
      
        return deferred.promise;

    };
});







