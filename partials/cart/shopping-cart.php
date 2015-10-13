<!--CART / SHOPPING CART-->
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
            <tr ng-if="cartItems.length > 0" ng-repeat="cartItem in cartItems track by $index">
                <td>
                    <img src="{{cartItem.img}}" alt="dark-black-2"/>
                    <div class="detail">
                        <h4>{{cartItem.name}}</h4>
                        <p>{{cartItem.edition}}</p>
                    </div>
                </td>
                <td>
                    <div class="cart-quantity">
                        <a class="quantity-btn minus" href="#" ng-click="(cartItem.quantity >= 2) ? cartItem.quantity = cartItem.quantity - 1 : cartItem.quantity = cartItem.quantity; updateProduct($index, cartItem.quantity, cartItem.price)"></a>
                        <span class="quantity">{{cartItem.quantity}}</span>
                        <a class="quantity-btn plus" href="#" ng-click="cartItem.quantity = cartItem.quantity + 1; updateProduct($index, cartItem.quantity, cartItem.price)"></a>
                    </div>
                </td>
                <td class="number">
                    €{{cartItem.price * cartItem.quantity | twoDecimal}}
                </td>
                <td class="edit">
                    <button ng-click="deleteCartItem($index)" class="send-btn delete"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                </td>
            </tr>
            <tr ng-if="cartItems.length > 0">
                <td class="discount-area">
                    <h4>Discount code</h4>
                    <input type="text" class="input-mix" placeholder="Your code" ng-model="discountCode"/>
                    <a href="" class="send-btn btn-mix" ng-click="addDiscountCode(discountCode)">Add</a>
                </td>
                <td><b ng-if="displayDiscountCode">{{displayDiscountCode}} </b>{{resDiscount}}</td>
                <td class="number"><span ng-if="displayDiscountPercent">-{{displayDiscountPercent}}%</span></td>
                <td></td>
            </tr>
            <tr class="total-area" ng-show="cartItems.length > 0">
                <td>
                    <h4>Total</h4>
                </td>
                <td></td>
                <td></td>
                <td class="right"><h4>€{{totalCart | twoDecimal}}</h4></td>
            </tr>
            <tr class="empty-cart" ng-hide="cartItems.length > 0">
                <td></td>
                <td>
                    Your cart is empty
                </td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-sm-12 cart-btn">
    <a href="shop" class="previous-btn">Continue shopping</a>
    <a href="#" class="next-btn" ng-if="!auth" ng-click="orderNow()">Login & order now</a>
    <a href="#" class="next-btn" ng-if="auth" ng-click="orderNow()">Order now</a>
</div>