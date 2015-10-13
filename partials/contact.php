<div class="row header sub contact">
    <div class="header-overlay">
        <h1>Say hello</h1>
        <h5>You can contact us. We will reply as soon as possible.</h5>
    </div>
</div>
<div class="row main-content">
    <div class="col-sm-12 form-contact-container" ng-controller="contact">
        <form name="contact" class="contactForm">
            <div class="col-sm-12">
                <h4>How can we help you ?</h4>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>First name <span class="label-required">*</span></label>
                    <input type="text" name="first_name" ng-model="contactForm.first_name" required/>
                    <p ng-show="contact.first_name.$invalid && contact.first_name.$touched" class="required-text">Field required</p>
                </div>
                <div class="form-group">
                    <label>Last name <span class="label-required">*</span></label>
                    <input type="text" name="last_name" ng-model="contactForm.last_name" required/>
                    <p ng-show="contact.last_name.$invalid && contact.last_name.$touched" class="required-text">Field required</p>
                </div>
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" name="company" ng-model="contactForm.company"/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" ng-model="contactForm.address"/>
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input type="text" name="state" ng-model="contactForm.state"/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Zip code</label>
                    <input type="text" name="zip_code" ng-model="contactForm.zip_code"/>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" ng-model="contactForm.city"/>
                </div>
                <div class="form-group">
                    <label>Email <span class="label-required">*</span></label>
                    <input type="email" name="mail" ng-model="contactForm.mail" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required/>
                    <p ng-show="contact.mail.$invalid && contact.mail.$touched" class="required-text">Field required or email not valid</p>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" ng-model="contactForm.phone"/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Message <span class="label-required">*</span></label>
                    <textarea name="message" ng-model="contactForm.message" rows="4" required></textarea>
                    <p ng-show="contact.message.$invalid && contact.message.$touched" class="required-text">Field required</p>
                    <p class="form-info"><span class="label-required">*</span> These fields are required</p>
                </div>
            </div>
            <div class="col-sm-12">
                <button type="submit" ng-click="submitForm()" class="send-btn" ng-disabled="contact.$invalid">Send message</button>
                <p ng-show="resContact" class="alert alert-warning response" role="alert">
                    {{resContact}}
                </p>
            </div>
        </form>
    </div>
</div>
<!--FOOTER-->
<div class="row footer-content" ng-include="'partials/footer.php'">
    <!--FOOTER VIEW-->
</div>