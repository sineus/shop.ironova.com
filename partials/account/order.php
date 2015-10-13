<!--ACCOUNT / ORDER TRACKING AND HISTORY-->
<div class="col-sm-6 order-section">
	<h4>Order tracking</h4>
    <div class="table-responsive">
    	 <table class="table table-curved">
            <thead>
                <tr>
                	<th>Order</th>
                    <th>Date</th>             
                    <th>Total</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr  ng-repeat="orderTracking in orderTrackings track by $index" ng-click="orderDetail(orderTracking.id_commande, orderTracking)">
                	<td class="id">
                        {{orderTracking.id_commande}}
                    </td>
                    <td>
                        {{orderTracking.date_com | date}}
                    </td>            
                    <td>
                        €{{orderTracking.total}}
                    </td>
                    <td ng-if="orderTracking.paiement == 0">
                    	<span class="tag-wait">Pending payment</span>
                    </td>
                    <td ng-if="orderTracking.paiement == 1">
                    	<span class="tag-success">Valide payment</span>
                    </td>
                    <td ng-if="orderTracking.paiement == 2">
                    	<span class="tag-error">Cancel payment</span>
                    </td>
                    <td ng-if="orderTracking.paiement == 3">
                    	<span class="tag-wait">Preparing your order</span>
                    </td>
                    <td ng-if="orderTracking.paiement == 4">
                    	<span class="tag-success">Order sent</span>
                    </td>
                    <td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-search"></span> Details</button>
                    </td>
                </tr>
                <tr ng-if="!orderTrackings">
                    <td></td>
                    <td></td>
                    <td>No orders</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-sm-6 order-section">
	<h4>Order history</h4>
	 <table class="table table-curved">
        <thead>
            <tr>
            	<th>Order</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr  ng-repeat="orderHistory in orderHistories track by $index" ng-click="">
            	<td class="id">
                    {{orderHistory.id_commande}}
                </td>
                <td>
                    {{orderHistory.date_com | date}}
                </td>           
                <td>
                    €{{orderHistory.total}}
                </td>
                <td ng-if="orderHistory.paiement == 4">
                    <span class="tag-success">Order sent</span>
                </td>
                <td></td>
                <td class="edit">
                    <button class="send-btn"><span class="glyphicon glyphicon-search"></span> Details</button>
                </td>
            </tr>
            <tr ng-if="!orderHistories">
                <td></td>
                <td></td>
                <td>No orders history</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>