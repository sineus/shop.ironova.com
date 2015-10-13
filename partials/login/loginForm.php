<!--LOGIN / LOGIN FORM-->
<form name="login" class="row login-form" autocomplete="off">
	<img src="img/logo-full-white.svg" alt="logo-full-ironova-white"/>
	<div class="form-group">
	    <!-- <label>Login <span class="label-required">*</span></label> -->
	    <input type="email" class="log-user" name="login_mail" placeholder="Login" ng-model="loginForm.login_mail" readonly onfocus="this.removeAttribute('readonly');" required/>
	    <p ng-show="login.login_mail.$error.required && login.login_mail.$dirty" class="required-text">Field required</p>
	    <p ng-show="login.login_mail.$error.email && login.login_mail.$dirty" class="required-text">That is not a valid email. Please input a valid email</p>
	</div>
	<div class="form-group">
	    <!-- <label>Password <span class="label-required">*</span></label> -->
	    <input type="password" class="log-psw" name="login_password" placeholder="Password" ng-model="loginForm.login_password" readonly onfocus="this.removeAttribute('readonly');" required/>
	    <p ng-show="login.login_password.$error.required && login.login_password.$dirty" class="required-text">Field required</p>
	</div>
	<div class="col-sm-12">
        <button type="submit" ng-click="submitLogin()" class="send-btn" ng-disabled="login.$invalid">Sign in</button>
        <p ng-show="resLogin" class="alert alert-warning response" role="alert">
            {{resLogin}}
        </p>
    </div>
    <div class="col-sm-12">
		<a href="" ng-click="selectTemplate(templatesLogin[1])">Don’t have an account ? <span>Sign up</span></a>
		<a href="" ng-click="selectTemplate(templatesLogin[2])">Forgot password ?</a>
	</div>
</form>