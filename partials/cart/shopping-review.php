<div class="col-sm-12 cart-detail">
    <table class="table table-curved">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="cartItem in cartItems track by $index">
                <td>
                    <img src="{{cartItem.img}}" alt="dark-black-2"/>
                    <div class="detail">
                        <h4>{{cartItem.name}}</h4>
                        <p>{{cartItem.edition}}</p>
                    </div>
                </td>
                <td>
                    <div class="cart-quantity">
                        <span class="quantity">{{cartItem.quantity}}</span>
                    </div>
                </td>
                <td class="number">
                    €{{cartItem.price * cartItem.quantity | twoDecimal}}
                </td>
                <td></td>
            </tr>
            <!-- <tr>
                <td>
                    <h5>Shipping</h5>
                </td>
                <td>
                    {{orderForm[0].delivery[0].type}}
                </td>
                <td></td>
                <td></td>
            </tr> -->
            <tr ng-if="displayDiscountCode && displayDiscountPercent">
                <td>
                    <h5>Discount code</h5>
                </td>
                <td>
                    {{displayDiscountCode}}
                </td>
                <td class="number">
                    -{{displayDiscountPercent}}%
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    Subtotal
                </td>
                <td></td>
                <td class="number">
                    €{{subTotal | twoDecimal}}
                </td>
                <td></td>
            </tr>
            <tr ng-if="userCountry == 'FR'">
                <td>
                    TVA 20%
                </td>
                <td></td>
                <td class="number">
                    €{{displayTax | twoDecimal}}
                </td>
                <td></td>
            </tr>
            <tr class="total-area">
                <td>
                    <h4>Total</h4>
                </td>
                <td></td>
                <td></td>
                <td class="right">
                    <h4>€{{displayFinalTotal | twoDecimal}}</h4>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-sm-12 cart-btn">
    <a href="#" class="previous-btn" ng-click="selectTemplate(templatesCart[3])">Previous</a>
    <a href="#" href="#" class="next-btn" ng-click="payCart()">Pay now</a>
</div>
<div ng-bind-html="cartRes | unsafe" ng-hide="cartRes">

</div>