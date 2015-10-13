<!--NEWSLETTER-->
<div class="col-sm-12 newsletter-container">
    <div class="col-sm-6">
        <h3>Discover all news</h3>
        <h5>Suscribe to get update and new offers.</h5>
    </div>
    <div class="col-sm-6 newsletter-form" ng-controller="newsletter">
        <form name="newsForm" class="newsletterForm">
            <input type="email" class="input-mix" name="newsletterMail" placeholder="Your email address" ng-model="mail" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required/>
            <button ng-click="newsletter()" class="send-btn btn-mix" type="submit" ng-disabled="newsForm.$invalid">Suscribe</button>
            <p ng-show="newsForm.newsletterMail.$error.required && newsForm.newsletterMail.$dirty" class="required-text">Field required</p>
            <p ng-show="newsForm.newsletterMail.$error.email && newsForm.newsletterMail.$dirty" class="required-text">That is not a valid email. Please input a valid email</p>
            <p class="response">{{res}}</p>
        </form>
    </div>
</div>
<!--NAV-->
<div class="col-sm-12 footer-nav">
    <div class="col-sm-3">
        <ul>
            <li><h4>Ironova</h4></li>
            <li><a href="#" ng-click="buildPage()">About us</a></li>
            <li><a href="#" ng-click="buildPage()">News</a></li>
            <li><a href="#" ng-click="buildPage()">Careers</a></li>
            <li><a href="#" ng-click="buildPage()">Blog</a></li>
        </ul>
    </div>
    <div class="col-sm-3">
        <ul>
            <li><h4>Service</h4></li>
            <li><a href="#" ng-click="buildPage()">Support</a></li>
            <li><a href="#" ng-click="buildPage()">FAQ</a></li>
            <li><a href="#" ng-click="buildPage()">Warranty</a></li>
            <li><a href="contact">Contact us</a></li>
        </ul>
    </div>
    <div class="col-sm-3">
        <ul>
            <li><h4>Orders</h4></li>
            <li><a href="#" ng-click="buildPage()">Order status</a></li>
            <li><a href="#" ng-click="buildPage()">Shipping policy</a></li>
            <li><a href="#" ng-click="buildPage()">Return policy</a></li>
        </ul>
    </div>
    <div class="col-sm-3">
        <ul>
            <li><h4>Legal</h4></li>
            <li><a href="#" ng-click="buildPage()">Privacy</a></li>
            <li><a href="#" ng-click="buildPage()">Terms & conditions</a></li>
            <li><a href="#" ng-click="buildPage()">Legal notice</a></li>
        </ul>
    </div>
</div>
<div class="separator"></div>
<!--SOCIAL NETWORK-->
<div class="col-sm-12 social-container">
    <ul>
        <li><a href="https://youtube.com/ironova/" target="_blank"><img src="img/youtube.svg" alt="youtube-logo"/></a></li>
        <li><a href="https://twitter.com/ironovay" target="_blank"><img src="img/twitter.svg" alt="twitter-logo"/></a></li>
        <li><a href="https://instagram.com/ironovafr/" target="_blank"><img src="img/instagram.svg" alt="instagram-logo"/></a></li>
        <li><a href="https://plus.google.com/+Ironova" target="_blank"><img src="img/google-plus.svg" alt="google-plus-logo"/></a></li>
        <li><a href="https://www.facebook.com/ironovaUS" target="_blank"><img src="img/facebook.svg" alt="facebook-logo"/></a></li>
    </ul>
</div>
<!--COPYRIGHT-->
<div class="col-sm-12 ruler">
    <p>© 2015 Ironova, All right reserved</p>
</div>