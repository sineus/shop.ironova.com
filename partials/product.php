<!--PRODUCT VIEW-->
<!--HEADER-->
<div class="row header sub account">
    <div class="header-overlay">
        <h1>Product</h1>
        <h5>Choosing the best to become the best.</h5>
    </div>
</div>
<!--MAIN-->
<div class="row main-content account product">
	<div class="col-sm-12 account-nav">
        <a href="" ng-class="{current:isActive(template)}" ng-repeat="template in templatesProduct" ng-click="selectTemplate(template)">{{template.name}}</a>
        <a href="shop" class="login-deconnect">Buy</a>
    </div>
    <div  ng-include="selectedTemplate">
        <!--PRODUCT DETAIL VIEW HERE-->
    </div>
    <div ng-include="'partials/product/price-table.php'">
    	<!--PRICE TABLE HERE-->
    </div>
</div> 
<!--FOOTER-->
<div class="row footer-content" ng-include="'partials/footer.php'">
    <!--FOOTER VIEW-->
</div>