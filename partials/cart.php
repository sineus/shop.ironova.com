<!--HEADER-->
<div class="row header sub cart">
    <div class="header-overlay">
        <!--TITLE-->
        <h1>Cart</h1>
        <h5>Items added to cart.</h5>
    </div>
</div>
<!--MAIN CONTENT-->
<div class="row main-content cart" ng-controller="cart">
    <div class="col-sm-12 cart-step">
        <h3 ng-class="{current:isActive(template)}" ng-repeat="template in templatesCart">{{template.name}} <span class="arrow-step"></span></h3>
    </div>
    <!-- {{orderForm}} -->
    <form name="orderForm" ng-submit="cartReview()" novalidate>
        <div  ng-include="selectedTemplate">
            <!--STEP VIEW HERE-->
        </div>  
    </form>
</div> 
<!--FOOTER-->
<div class="row footer-content" ng-include="'partials/footer.php'">
    <!--FOOTER VIEW-->
</div>

