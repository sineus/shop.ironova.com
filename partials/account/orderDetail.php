<!--ACCOUNT / ORDER DETAIL MODAL-->
<div id="order-printable">
    <div class="col-sm-12 order-section">
    	<h4>Order n°{{order.id_commande}}</h4>
        <span class="tag-wait" ng-if="order.paiement == 0">Pending payment</span>
        <span class="tag-success" ng-if="order.paiement == 1">Valide payment</span>
        <span class="tag-error" ng-if="order.paiement == 2">Cancel payment</span>
        <span class="tag-wait" ng-if="order.paiement == 3">Preparing your order</span>
        <span class="tag-success" ng-if="order.paiement == 4">Order sent</span>
    </div>
    <div class="col-sm-6 order-section">
        <h5>Billing address</h5>
        <ul>
            <li>{{order.civilite_fact}} {{order.prenom_fact}} {{order.nom_fact}}</li>
            <li>{{order.adresse1_fact}}</li>
            <li>{{order.ville_fact}} {{order.cp_fact}}</li>
            <li>{{order.pays_fact}}</li>
        </ul>
    </div>
    <div class="col-sm-6 order-section">
        <h5>Shipping address</h5>
        <ul>
            <li>{{order.civilite_livr}} {{order.prenom_livr}} {{order.nom_livr}}</li>
            <li>{{order.adresse1_livr}}</li>
            <li>{{order.ville_livr}} {{order.cp_livr}}</li>
            <li>{{order.pays_livr}}</li>
        </ul>
    </div>
    <div class="col-sm-12 order-section">
    	<table class="table table-curved">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="orderItem in orderItems track by $index">
                    <td>
                        <img src="{{orderItem.path_img}}"/>
                        <div class="detail">
                            <h5>{{orderItem.nom_produit}}</h5>
                            <p>{{orderItem.edition}}</p>
                        </div>
                    </td>
                    <td class="number">
                        {{orderItem.qte}}
                    </td>
                    <td class="number">
                        €{{orderItem.prix * orderItem.qte}}
                    </td>
                </tr>
                <tr>
                	<td>Subtotal</td>
                	<td></td>
                	<td class="number">€{{order.total}}</td>
                </tr>
                <tr>
                	<td>Shipping</td>
                	<td></td>
                	<td class="number">€{{order.frais_port}}</td>
                </tr>
                <tr ng-if="userCountry == 'FR'">
                	<td>TVA 20%</td>
                	<td></td>
                	<td class="number">€{{(order.total / 100) * 20 | twoDecimal}}</td>
                </tr>    
                <tr class="total-area">
                    <td>
                        <h4>Total</h4>
                    </td>
                    <td></td>
                    <td>
                        <h4>€{{order.total}}</h4>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-12 order-section center">
        <p>If the information does not match or if you have any problems, please contact <a href="mailto:support@ironova.com">support@ironova.com</a></p>
        <button class="send-btn" ng-click="printPage('order-printable')"><span class="glyphicon glyphicon-print"></span> Print</button>
    </div>
</div>



