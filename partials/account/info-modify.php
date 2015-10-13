<!--ACCOUNT / INFORMATIONS EDIT MODAL-->
<div class="col-sm-12">
	<h4><span class="glyphicon glyphicon-pencil"></span> {{display}}</h4>
	<div class="form-group">
		<input type="{{type}}" ng-model="modifyItem" placeholder="Your new {{display}}"/>
	</div>
	<div class="form-group">
		<button class="send-btn btn-cancel" ng-click="closeDialog()">Cancel</button>
		<button class="send-btn" ng-click="updateAccount(name, modifyItem)">Modify</button>
	</div>
</div>