<div class="row header sub account">
    <div class="header-overlay">
        <h1>Account</h1>
        <h5>View order, history and change your parameter.</h5>
    </div>
</div>
<div class="row main-content account" ng-controller="account">
    <div class="col-sm-12 account-nav">
        <a href="#" ng-class="{current:isActive(template)}" ng-repeat="template in templatesCart" ng-click="selectTemplate(template)">{{template.name}}</a>
        <a ng-controller="login" href="#" class="login-deconnect" ng-click="logOut()">Log out</a>
    </div>
    <div class="col-sm-12 account-welcome">
        <p>Hello <span>{{userName | capitalize}}</span>, welcome to your space</p>
    </div>
    <div class="row account-view" ng-include="selectedTemplate">
        <!--ACCOUNT VIEW HERE-->
    </div>
    
</div> 
<!--FOOTER-->
<div class="row footer-content" ng-include="'partials/footer.php'">
    <!--FOOTER VIEW-->
</div>