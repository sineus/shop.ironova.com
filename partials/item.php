<!--PRODUCT ITEM VIEW-->
<div class="row main-content single">
	<!--SLIDESHOW-->
	<div class="col-sm-6 slideshow">
		<div class="col-sm-12 slider">
		    <div ng-repeat="photo in photos" class="slide" ng-swipe-right="showPrev()" ng-swipe-left="showNext()" ng-show="isActive($index)" style="background:url('{{photo.path_img}}');background-size:cover;background-position:center center;background-repeat:no-repeat"></div>
		</div>
		<div class="col-sm-12">
		    <ul class="slider-list">
		        <li ng-repeat="photo in photos" ng-class="{'active':isActive($index)}" class="col-sm-4" style="background:url('{{photo.path_img}}');background-size:cover;background-position:center center;background-repeat:no-repeat" ng-click="showPhoto($index);"></li>
		    </ul>
		</div>
	</div>
	<!--DETAILS-->
	<div class="col-sm-6 product-detail">
		<div class="col-sm-12 title">
			<h1>{{product.name}}</h1>
			<h2>{{product.edition}}</h2>
		</div>
		 <div class="col-sm-12 product-stock">
			<span ng-show="product.id_status == 1" class="item-stock stock">In stock</span>
			<span ng-show="product.id_status == 0" class="item-stock unavailable">Unavailable</span>
		</div>
		<div class="col-sm-12 product-intro" ng-bind-html="product.description | unsafe"></div>
		<div class="col-sm-12 product-content">
			<h4>Box content</h4>
			<div ng-bind-html="product.content | unsafe"></div>
		</div>
		<div class="col-sm-12 product-price" ng-controller="cart">
			<a href="" class="buy-btn" ng-click="addCart(product.id_product, product.name, product.edition, '../img/bracelet-black.jpg', product.price_ttc)"><span>Add to cart</span></a>
			<h3>€{{product.price_ttc}}</h3>
		</div>
		<div class="col-sm-12 product-info" ng-bind-html="product.info | unsafe"> 
			<p>Frais de port offert pour la France métropolitaine</p>
		</div>
	</div>
</div>
<!--FOOTER-->
<div class="row footer-content" ng-include="'partials/footer.php'">
    <!--FOOTER VIEW-->
</div>