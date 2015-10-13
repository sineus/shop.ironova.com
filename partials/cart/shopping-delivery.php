<div class="col-sm-12 delivery cart-section">
	<h4 class="cart-title">Choose your delivery <span class="label-required">*</span></h4>
	<div class="radio" ng-repeat="delivery in deliveries.offers">
		<input type="radio" name="delivery" id="delivery-{{$index}}" value="{{delivery.operator.code}}" ng-model="orderForm.type_delivery" required> 
  		<label for="delivery-{{$index}}" class="radio-custom">
  			<img src="{{delivery.operator.logo}}" alt="{{delivery.operator.code}}"/>
  			<span>{{delivery.operator.label}} <b>{{delivery.price['tax-exclusive']}}€</b></span>
  		</label>
	</div>
	<p ng-show="orderForm.type_delivery.$error.required && orderForm.type_delivery.$dirty" class="required-text">Field required</p>
</div>
<div class="col-sm-12 total-cart cart-section">
	<div class="row">
		<h4>Total</h4>
		<h4 class="right">€{{totalCart | twoDecimal}}</h4>
	</div>
</div>
<div class="col-sm-12 cart-btn cart-section">
    <a href="#" class="previous-btn" ng-click="selectTemplate(templatesCart[1])">Previous</a>
    <button type="button" class="next-btn" ng-click="selectTemplate(templatesCart[3])" ng-disabled="!orderForm.$valid">Next</button>
</div>