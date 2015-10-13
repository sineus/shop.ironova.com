<div class="col-sm-12 payment cart-section">
	<h4 class="cart-title">Credit card <span class="label-required">*</span></h4>
	<div class="radio">
		<input type="radio" id="paymentCard1" value="CB" ng-model="orderForm.type_payment" required> 
  		<label for="paymentCard1" class="radio-custom">
  			<img src="img/cb.svg" alt="cart-cb"/>
  			<span>Carte Bleue</span>
  		</label>
	</div>
	<div class="radio">
		<input type="radio" id="paymentCard2" value="MASTERCARD" ng-model="orderForm.type_payment" required> 
  		<label for="paymentCard2" class="radio-custom">
  			<img src="img/mastercard.svg" alt="cart-mastercard"/>
  			<span>Mastercard</span>
  		</label>
	</div>
	<div class="radio">
		<input type="radio" id="paymentCard3" value="MAESTRO" ng-model="orderForm.type_payment" required>
  		<label for="paymentCard3" class="radio-custom"> 
  			<img src="img/maestro.svg" alt="cart-maestro"/>
  			<span>Maestro</span>
  		</label>
	</div>
	<div class="radio">
  		<input type="radio" id="paymentCard4" value="VISA" ng-model="orderForm.type_payment" required> 
  		<label for="paymentCard4" class="radio-custom">
  			<img src="img/visa.svg" alt="cart-visa"/>
  			<span>Visa</span>
  		</label>
	</div>
	<div class="radio">
		<input type="radio" id="paymentCard5" value="VISA_ELECTRON" ng-model="orderForm.type_payment" required> 
  		<label for="paymentCard5" class="radio-custom">
  			<img src="img/visa-electron.svg" alt="cart-visa-electron"/> 
  			<span>Visa Electron</span>
  		</label>
	</div>
    <p ng-show="orderForm.type_payment.$error.required && orderForm.type_payment.$dirty" class="required-text">Field required</p>
</div>
<div class="col-sm-12 total-cart cart-section">
	<div class="row">
		<h4>Total</h4>
		<h4 class="right">€{{totalCart | twoDecimal}}</h4>
	</div>
</div>
<div class="col-sm-12 cart-btn cart-section">
    <a href="#" class="previous-btn" ng-click="selectTemplate(templatesCart[2])">Previous</a>
    <button type="submit" class="next-btn" ng-disabled="!orderForm.$valid">Review order</button>
</div>