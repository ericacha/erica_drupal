<?php function Untitled_shoppingcart_1() { 
?>
   <div class=" bd-shoppingcart-1">
    <div class=" bd-carttitle-1">
    <h2>Shopping Cart</h2>
</div>
    <div class=" bd-shoppingcarttable-1">
    <table class=" bd-table">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th><span>Product Name</span></th>
                <th></th>
                <th><span>Unit Price</span></th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
        <tr>
            <td>
                <div class=" bd-container-27">
                    <button class=" bd-button" type="button" title="Continue Shopping"><span><span>Continue Shopping</span></span></button>
                    <button class=" bd-button" type="submit" title="Update Shopping Cart"><span><span>Update Shopping Cart</span></span></button>
                </div>
            </td>
        </tr>
        </tfoot>
        <tbody>
        <tr>
            <td><a href="#" title="ProductTitle">
                <img class=" bd-imagestyles" src="" width="200" height="200" alt="ProductTitle">
            </a>
            </td>
            <td>
                <h3 class=" bd-producttext-11">
                    <a href="#">ProductTitle</a>
                </h3>
            </td>

            <td>
                <a href="#" title="Edit item parameters">Edit</a>
            </td>

            <td>
                <span>Unit Price</span>
                    <span>
                    <span>$212.00</span>
                </span>
            </td>

            <td>
                <input title="Quantity" class=" bd-bootstrapinput form-control">
            </td>

            <td>
                <span>$212.00</span>
            </td>

            <td>
                <a title="Remove item"><span class=" bd-icon-23"></span>Remove item</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>
    <div class="row">
        <div class="col-md-8">
            <div class=" bd-block">
                <div class=" bd-container-1">
                    <h2>Estimate Shipping and Tax</h2>
                </div>
                <div>
                    <div class=" bd-container-2">
                        <form>
                            <p>Enter your destination to get a shipping estimate.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class=" bd-block">
                <div class=" bd-container-1">
                    <h2>Discount Codes</h2>
                </div>
                <div class=" bd-container-2">
                    <div>
                        <label for="coupon_code">Enter your coupon code if you have one.</label>
                        <input type="hidden" name="remove">
                        <div>
                            <input class="input-text" id="coupon_code" name="coupon_code" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class=" ">
                <div class=" bd-container-2">
                    <div class=" bd-shoppingcartgrandtotal-1">
    <table class=" bd-table-2">
        <thead class=" bd-tableitem-5">
            <tr>
                <td colspan="2">Totals</td>
            </tr>
        </thead>
        <tbody class=" bd-tableitem-6">
            <tr>
                <td> Subtotal </td>
                <td><span>$289.00</span></td>
            </tr>
            <tr class=" bd-tableitem-8">
                <td>
                    Shipping &amp; Handling (Flat Rate - Fixed)
                </td>
                <td><span>$10.00</span></td>
            </tr>
        </tbody>
        <tfoot class=" bd-tableitem-7">
            <tr class=" bd-container-22">
                <td colspan="2">
                    <div>Grand Total: $229.00</div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
                    <button class=" bd-button">Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }