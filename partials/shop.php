<!--SHOP VIEW-->
<!--HEADER-->
<div class="row header sub shop">
    <div class="header-overlay">
        <h1>Shop</h1>
        <h5>Choosing the best to become the best.</h5>
    </div>
</div>
<!--MAIN-->
<div class="row main-content shop" ng-controller="shop">
    <!--PRODUCT-->
    <div class="col-sm-4 product-container" ng-repeat="product in products track by $index">
        <img src="{{product.path_img}}"/>
        <div class="col-sm-12 product-detail">
            <h4>{{product.name}}</h4>
            <h5>{{product.edition}}</h5>
            <h1>€{{product.price_ttc}}</h1>
        </div>
        <div class="col-sm-12 product-cart">
            <a ng-href="shop/products/{{product.url}}" class="buy-btn"><span>Buy</span></a>
        </div>
    </div>
</div> 
<!--FOOTER-->
<div class="row footer-content" ng-include="'partials/footer.php'">
    <!--FOOTER VIEW-->
</div>