<div class="row header">
    <div class="header-overlay">
        <h1>{{ 'homeTitle' | translate }}</h1>
        <h5>{{ 'homeSubTitle' | translate }}</h5>
        <a class="more-btn" href="product">{{ 'homeBtnMore' | translate }}</a>
        <a class="discover-btn" href="" ng-click="discover()">
            <span class="play-btn"></span>{{ 'homeBtnDiscover' | translate }}
        </a>
        <div ng-click="scrollTo(700)" class="scroll-btn"></div>
    </div>
    <video autoplay muted loop>
        <source src="img/iro.webm" type="video/webm">
        Your browser does not support the video tag.
    </video>
</div>
<div class="row main-content home">
    <div class="col-sm-12 show-product">
        <h1>Iro</h1>
        <h5>How active are you ?</h5>
        <img src="img/bracelet-black.jpg" alt="iro-black-wearable"/>
        <div class="col-sm-12">
            <a href="shop" class="buy-btn"><span>Pre-order now</span></a>
        </div>
        <div class="col-sm-6 price-info right">
            Classic edition from €49.90
        </div>
        <div class="col-sm-6 price-info">
            Limited edition from €59.90
        </div>  
    </div> 
    <div class="col-sm-12 explore-container">
        <div class="col-sm-6 explore">
            <div class="more-container">
                <h2>Iro is different</h2>
                <a class="learn-more-btn" href="#" ng-click="buildPage()">Learn more<span class="next-icon"></span></a>
            </div>
        </div>
        <div class="col-sm-6 explore">
            <div class="more-container">
                <h2>Explore new app</h2>
                <a class="learn-more-btn" href="#" ng-click="buildPage()">Learn more<span class="next-icon"></span></a>
            </div>
        </div>
    </div>
</div>
<!--FOOTER-->
<div class="row footer-content" ng-include="'partials/footer.php'">
    <!--FOOTER VIEW-->
</div>