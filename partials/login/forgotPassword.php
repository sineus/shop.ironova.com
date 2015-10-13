<!--LOGIN / FORGOT PASSWORD FORM-->
<form name="forgotPassword" class="row register-form" autocomplete="off">
	<div class="col-sm-12 title">
		<h3>Lost password</h3>
		<p>Do not worry, send us your mail, we refer you your password</p>
	</div>
	<div class="col-sm-12">
		<div class="form-group">
			<input type="email" class="reg-mail" name="mail" placeholder="Email" ng-model="forgotForm.mail" required/>
		    <p ng-show="forgotPassword.mail.$error.required && forgotPassword.mail.$dirty" class="required-text">Field required</p>
		    <p ng-show="forgotPassword.mail.$error.email && forgotPassword.mail.$dirty" class="required-text">That is not a valid email. Please input a valid email</p>
		</div>
	</div>
	<div class="col-sm-12">
        <button type="submit" ng-click="submitForgotPassword()" class="send-btn" ng-disabled="forgotPassword.$invalid">Send</button>
        <p ng-show="resForgotPassword" class="alert alert-warning response" role="alert">
            {{resForgotPassword}}
        </p>
    </div>
</form>