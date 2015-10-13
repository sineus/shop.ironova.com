<!--LOGIN / REGISTER FORM-->
<form name="register" class="row register-form" autocomplete="off">
	<div class="col-sm-12 title">
		<h3>Register</h3>
		<p>Register now to join the iro universe and participate in numerous events</p>
	</div>
	<div class="col-sm-12">
		<div class="form-group select-custom reg-gender">
			<span class="caret"></span>
			<select name="gender" ng-model="registerForm.gender" ng-init="registerForm.gender = '?'" ng-pattern="/^[a-zA-Z0-9]*$/">
				<option value="?">Select your gender</option>
				<option value="Mr">Mr</option>
				<option value="Mme">Mme</option>
			</select>
			<p ng-show="register.gender.$error.required && register.gender.$dirty && register.gender.$error.pattern" class="required-text">Field required</p>
		</div>
		<div class="form-group">
			<input type="text" class="reg-lastname" name="last_name" placeholder="Last name" ng-model="registerForm.last_name" required/>
		    <p ng-show="register.last_name.$error.required && register.last_name.$dirty" class="required-text">Field required</p>
		</div>
		<div class="form-group">
			<input type="text" class="reg-lastname" name="first_name" placeholder="First name" ng-model="registerForm.first_name" required/>
		    <p ng-show="register.first_name.$error.required && register.first_name.$dirty" class="required-text">Field required</p>
		</div>
		<div class="form-group">
			<input type="date" class="reg-birth" name="birthday" placeholder="Birthday" ng-model="registerForm.birthday" required/>
		    <p ng-show="register.birthday.$error.required && register.birthday.$dirty" class="required-text">Field required</p>
		</div>
		<div class="form-group">
			<input type="text" class="reg-weight" name="weight" placeholder="Weight" ng-model="registerForm.weight" ng-pattern="/^[0-9]+$/" required/>
		    <p ng-show="register.weight.$error.required && register.weight.$dirty" class="required-text">Field required</p>
		    <p ng-show="register.weight.$error.pattern && register.weight.$dirty" class="required-text">That is not a number</p>
		</div>
		<div class="form-group">
			<input type="text" class="reg-height" name="height" placeholder="Height" ng-model="registerForm.height" ng-pattern="/^[0-9]+$/" required/>
		    <p ng-show="register.height.$error.required && register.height.$dirty" class="required-text">Field required</p>
		    <p ng-show="register.height.$error.pattern && register.height.$dirty" class="required-text">That is not a number</p>
		</div>
		<div class="form-group">
			<input type="text" class="reg-address" name="address" placeholder="Address" ng-model="registerForm.address" required/>
		    <p ng-show="register.address.$error.required && register.address.$dirty" class="required-text">Field required</p>
		</div>
		<div class="form-group">
			<input type="text" class="reg-city" name="city" placeholder="City" ng-model="registerForm.city" ng-pattern="/^[a-zA-Z0-9]*$/" required/>
		    <p ng-show="register.city.$error.required && register.city.$dirty && register.city.$error.pattern" class="required-text">Field required</p>
		</div>
		<div class="form-group">
			<input type="text" class="reg-zip" name="zip" placeholder="Zip" ng-model="registerForm.zip" ng-pattern="/^[0-9]+$/" required/>
		    <p ng-show="register.zip.$error.required && register.zip.$dirty && register.zip.$error.pattern" class="required-text">Field required</p>
		</div>
		<div class="form-group select-custom reg-country">
			<span class="caret"></span>
		    <select class="form-control" name="country" ng-model="registerForm.country" ng-init="registerForm.country = '?'" ng-pattern="/^[a-zA-Z0-9]*$/" required>
		    		<option value="?">Select your country</option>
					<option ng-repeat="country in countryList.countries" value="{{country.code}}">{{country.label}}</option>
			</select>
		    <p ng-show="register.country.$error.required && register.country.$dirty && register.country.$error.pattern" class="required-text">Field required</p>
		</div>
		<div class="form-group">
			<input type="text" class="reg-phone" name="phone" placeholder="Phone" ng-model="registerForm.phone" ng-pattern="/^[0-9]+$/" required/>
		    <p ng-show="register.phone.$error.required && register.phone.$dirty" class="required-text">Field required</p>
		    <p ng-show="register.phone.$error.pattern && register.phone.$dirty" class="required-text">That is not a number</p>
		</div>
		<div class="form-group">
			<input type="text" class="reg-mobile" name="mobile" placeholder="Mobile" ng-model="registerForm.mobile" ng-pattern="/^[0-9]+$/" required/>
		    <p ng-show="register.mobile.$error.required && register.mobile.$dirty" class="required-text">Field required</p>
		    <p ng-show="register.mobile.$error.pattern && register.mobile.$dirty" class="required-text">That is not a number</p>
		</div>
		<div class="form-group">
			<input type="email" class="reg-mail" name="mail" placeholder="Email" ng-model="registerForm.mail" required/>
		    <p ng-show="register.mail.$error.required && register.mail.$dirty" class="required-text">Field required</p>
		    <p ng-show="register.mail.$error.email && register.mail.$dirty" class="required-text">That is not a valid email. Please input a valid email</p>
		</div>
		<div class="form-group">
			<input type="password" class="reg-password" name="password" placeholder="Password" ng-model="registerForm.password" ng-minlength="8" ng-maxlength="20" ng-pattern="/^[a-zA-Z0-9]*$/" required/>
		    <p ng-show="register.password.$error.required && register.password.$dirty" class="required-text">Field required</p>
		    <p ng-show="!register.password.$error.required && (register.password.$error.minlength || register.password.$error.maxlength) && register.password.$error.pattern" class="required-text">Passwords must be between 8 and 20 alphanumerical characters.</p>
		</div>
		<div class="form-group">
			<input type="password" class="reg-password" name="password_b" placeholder="Confirm password" ng-model="registerForm.password_b" required nx-equal="registerForm.password"/>
			<p ng-show="register.password_b.$error.required" class="required-text">Please confirm password</p>
		    <p ng-show="register.password_b.$error.nxEqual" class="required-text">Passwords do not match.</p>
		</div>
	</div>
	<div class="col-sm-12">
        <button type="submit" ng-click="submitRegister()" class="send-btn" ng-disabled="register.$invalid">Sign Up</button>
        <p ng-show="resRegister" class="alert alert-warning response" role="alert">
            {{resRegister}}
        </p>
    </div>
    <div class="col-sm-12">
		<a href="#">By clicking <b>Sign Up</b> you are indicating that you have read and agree to the <span>Privacy Policy</span> and <span>Terms of Service</span></a>
	</div>
</form>