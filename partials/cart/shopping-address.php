	<div class="col-sm-12 billing-address cart-section">
		<h4 class="cart-title">Billing address <span class="label-required">*</span></h4>
		<div class="col-sm-12 no-padding">
			<a href="#" class="send-btn" ng-class="{current: !useCustomBilling}" ng-click="useAccountForBilling()">Use account address</a>
			<a href="#" class="send-btn" ng-class="{current: useCustomBilling}" ng-click="useCustomForBilling()">Use custom address</a>
		</div>
		<div class="col-sm-6 form-part">
	  		<div class="form-group">
	            <label>Gender <span class="label-required">*</span></label>
	            <select name="gender" ng-model="orderForm.billing.gender" ng-init="orderForm.billing.gender = orderForm.billing.gender">
					<option value="Mr">Mr</option>
					<option value="Mme">Mme</option>
				</select>
	            <p ng-show="orderForm.billing.gender.$error.required && orderForm.billing.gender.$dirty" class="required-text">Field required</p>
	    	</div>
	    	<div class="form-group">
	            <label>First name <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.billing.first_name" required/>
	            <p ng-show="orderForm.billing.first_name.$error.required && orderForm.billing.first_name.$dirty" class="required-text">Field required</p>
	    	</div>
	        <div class="form-group">
	            <label>Last name <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.billing.last_name" required/>
	            <p ng-show="orderForm.billing.last_name.$error.required && orderForm.billing.last_name.$dirty" class="required-text">Field required</p>
	        </div>
	        <div class="form-group">
	            <label>Address <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.billing.address" required/>
	            <p ng-show="orderForm.billing.address.$error.required && orderForm.billing.address.$dirty" class="required-text">Field required</p>
	        </div>
	    </div>
	    <div class="col-sm-6 form-part">
	        <div class="form-group">
	            <label>City <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.billing.city" required/>
	            <p ng-show="orderForm.billing.city.$error.required && orderForm.billing.city.$dirty" class="required-text">Field required</p>
	        </div>
	        <div class="form-group">
	            <label>Zip code <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.billing.zip" ng-pattern="/^[0-9]+$/" required/>
	            <p ng-show="orderForm.billing.zip.$error.required && orderForm.billing.zip.$dirty" class="required-text">Field required</p>
	        </div>
	        <div class="form-group">
	        	<label>Country <span class="label-required">*</span></label>
	            <select class="form-control" ng-model="orderForm.billing.country" required>
	            	<option value="?">Select your country</option>
					<option ng-repeat="country in countryList.countries" value="{{country.code}}" ng-selected="country.code == orderForm.shipping.country">{{country.label}}</option>
				</select>
	            <p ng-show="orderForm.billing.country.$error.required && orderForm.billing.country.$dirty" class="required-text">Field required</p>
	        </div>
	        <div class="form-group">
	            <label>Phone number <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.billing.phone" ng-pattern="/^[0-9]+$/" required/>
	            <p ng-show="orderForm.billing.phone.$error.required && orderForm.billing.phone.$dirty" class="required-text">Field required</p>
	        </div>
	   	</div>
	</div>
	<div class="col-sm-12 shipping-address cart-section">
		<h4 class="cart-title">Shipping address <span class="label-required">*</span></h4>
		<div class="col-sm-12 no-padding">
			<a href="#" class="send-btn" ng-class="{current: !useCustomShipping}" ng-click="useAccountForShipping()">Use account address</a>
			<a href="#" class="send-btn" ng-class="{current: useCustomShipping}" ng-click="useCustomForShipping()">Use custom address</a>
		</div>
		<div class="col-sm-6 form-part">
	  		<div class="form-group">
	            <label>Gender <span class="label-required">*</span></label>
	            <select name="gender" ng-model="orderForm.shipping.gender" ng-init="orderForm.shipping.gender = orderForm.shipping.gender">
					<option value="Mr">Mr</option>
					<option value="Mme">Mme</option>
				</select>
	            <p ng-show="orderForm.shipping.gender.$error.required && orderForm.shipping.gender.$dirty" class="required-text">Field required</p>
	        </div>
	        <div class="form-group">
	            <label>First name <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.shipping.first_name" required/>
	            <p ng-show="orderForm.shipping.first_name.$error.required && orderForm.shipping.first_name.$dirty" class="required-text">Field required</p>
	        </div>
	        <div class="form-group">
	            <label>Last name <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.shipping.last_name" required/>
	            <p ng-show="orderForm.shipping.last_name.$error.required && orderForm.shipping.last_name.$dirty" class="required-text">Field required</p>
	        </div>
	        <div class="form-group">
	            <label>Address <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.shipping.address" required/>
	            <p ng-show="orderForm.shipping.address.$error.required && orderForm.shipping.address.$dirty" class="required-text">Field required</p>
	        </div>
	    </div>
	    <div class="col-sm-6 form-part">
	    	<div class="form-group">
	            <label>City <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.shipping.city" required/>
	            <p ng-show="orderForm.shipping.city.$error.required && orderForm.shipping.city.$dirty" class="required-text">Field required</p>
	        </div>
	        <div class="form-group">
	            <label>Zip code <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.shipping.zip" ng-pattern="/^[0-9]+$/" required/>
	            <p ng-show="orderForm.shipping.zip.$error.required && orderForm.shipping.zip.$dirty" class="required-text">Field required</p>
	        </div>
	        <div class="form-group">
	        	<label>Country <span class="label-required">*</span></label>
				<select class="form-control" ng-model="orderForm.shipping.country" required>
					<option value="?">Select your country</option>
					<option ng-repeat="country in countryList.countries" value="{{country.code}}" ng-selected="country.code == orderForm.shipping.country">{{country.label}}</option>
				</select>
	            <p ng-show="orderForm.shipping.country.$error.required && orderForm.shipping.country.$dirty" class="required-text">Field required</p>
	        </div>
	        <div class="form-group">
	            <label>Phone number <span class="label-required">*</span></label>
	            <input type="text" ng-model="orderForm.shipping.phone" ng-pattern="/^[0-9]+$/" required/>
	            <p ng-show="orderForm.shipping.phone.$error.required && orderForm.shipping.phone.$dirty" class="required-text">Field required</p>
	        </div>
	    </div>
	</div>
	<div class="col-sm-12 total-cart cart-section">
		<div class="row">
			<h4>Total</h4>
			<h4 class="right">€{{totalCart | twoDecimal}}</h4>
		</div>
	</div>
	<div class="col-sm-12 cart-btn cart-section">
	    <a href="#" class="previous-btn" ng-click="selectTemplate(templatesCart[0])">Previous</a>
	    <button type="button" class="next-btn" ng-click="generateOffer(orderForm.billing, cartItems)" ng-disabled="!orderForm.$valid">Next</button>
	</div>