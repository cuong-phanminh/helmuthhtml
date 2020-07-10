<?php
include("header.php");
?>
<div class="content" id="content-checkout">
    <div class="main" id="main-checkout">
        <div class="billing-fields">
            <h3>Billing Address</h3>
            <p class="form-row validate-required" id="billing_first_name_field" data-priority="10"><label
                    for="billing_first_name" class="control-label">First name <abbr class="required"
                        title="required">*</abbr></label><input type="text" class="input-text form-control"
                    name="billing_first_name" id="billing_first_name" placeholder="" value="" autocomplete="given-name"
                    autofocus="autofocus"></p>

            <p class="form-row validate-required" id="billing_last_name_field" data-priority="20"><label
                    for="billing_last_name" class="control-label">Last name <abbr class="required"
                        title="required">*</abbr></label><input type="text" class="input-text form-control"
                    name="billing_last_name" id="billing_last_name" placeholder="" value="" autocomplete="family-name">
            </p>


            <p class="form-row validate-required" id="billing_address_1_field" data-priority="50"><label
                    for="billing_address_1" class="control-label">Street address <abbr class="required"
                        title="required">*</abbr></label><input type="text" class="input-text form-control"
                    name="billing_address_1" id="billing_address_1" placeholder="House number and street name" value=""
                    autocomplete="address-line1"></p>

            <p class="form-row form-group" id="billing_address_2_field" data-priority="60"><input type="text"
                    class="input-text form-control" name="billing_address_2" id="billing_address_2"
                    placeholder="Apartment, suite, unit etc. (optional)" value="" autocomplete="address-line2"></p>

            <p class="form-row validate-required" id="billing_city_field" data-priority="70"
                data-o_class="form-row validate-required"><label for="billing_city" class="control-label">Town / City
                    <abbr class="required" title="required">*</abbr></label><input type="text"
                    class="input-text form-control" name="billing_city" id="billing_city" placeholder="" value=""
                    autocomplete="address-level2"></p>

            <p class="form-row invalid-required-field" id="billing_state_field" data-priority="80"
                data-o_class="form-row invalid-required-field">
                <label for="billing_state" class="control-label">State <abbr class="required"
                        title="required">*</abbr></label><select name="billing_state" id="billing_state"
                    class="state_select form-control select2-hidden-accessible" autocomplete="address-level1"
                    data-placeholder="" tabindex="-1" aria-hidden="true">
                    <option value="">Select an option…</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                    <option value="AA">Armed Forces (AA)</option>
                    <option value="AE">Armed Forces (AE)</option>
                    <option value="AP">Armed Forces (AP)</option>
                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                    style="width: 100%;"><span class="selection"><span
                            class="select2-selection select2-selection--single" aria-haspopup="true"
                            aria-expanded="false" tabindex="0" aria-labelledby="select2-billing_state-container"
                            role="combobox"><span class="select2-selection__rendered"
                                id="select2-billing_state-container" role="textbox" aria-readonly="true"><span
                                    class="select2-selection__placeholder"></span></span><span
                                class="select2-selection__arrow" role="presentation"><b
                                    role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                        aria-hidden="true"></span></span></p>

            <p class="form-row  validate-postcode" id="billing_postcode_field" data-priority="90"
                data-o_class="form-row  validate-postcode"><label for="billing_postcode" class="control-label">ZIP <abbr
                        class="required" title="required">*</abbr></label><input type="text"
                    class="input-text form-control" name="billing_postcode" id="billing_postcode" placeholder=""
                    value="" autocomplete="postal-code"></p>

            <p class="form-row  validate-phone" id="billing_phone_field" data-priority="100"><label for="billing_phone"
                    class="control-label">Phone <abbr class="required" title="required">*</abbr></label><input
                    type="tel" class="input-text form-control" name="billing_phone" id="billing_phone" placeholder=""
                    value="" autocomplete="tel"></p>

            <p class="form-row  validate-email" id="billing_email_field" data-priority="110"><label for="billing_email"
                    class="control-label">Email address <abbr class="required" title="required">*</abbr></label><input
                    type="email" class="input-text form-control" name="billing_email" id="billing_email" placeholder=""
                    value="" autocomplete="email username"></p>

            <div class="create-account" style="display: none;">

                <p>Create an account by entering the information below. If you are a returning customer please login
                    at the top of the page.</p>

                <p class="form-row validate-required" id="account_password_field" data-priority=""><label
                        for="account_password" class="control-label">Create account password <abbr class="required"
                            title="required">*</abbr></label><input type="password" class="input-text form-control"
                        name="account_password" id="account_password" placeholder="Password" value=""></p>

                <div class="clear"></div>
            </div>
        </div> <!-- billing-fields -->

        <div class="shipping-fields">
            <h3 id="ship-to-different-address">
                <label for="ship-to-different-address-checkbox" class="checkbox" id="checkbox">Ship to a different
                    address?</label>
                <input id="ship-to-different-address-checkbox" class="form-control input-checkbox"
                    onclick="checkDifferentAddress()" checked="checked" type="checkbox" name="ship_to_different_address"
                    value="1">
            </h3>

            <div class="shipping_address" id="shipping_address">




                <p class="form-row validate-required" id="shipping_first_name_field" data-priority="10">
                    <label for="shipping_first_name" class="control-label">First name <abbr class="required"
                            title="required">*</abbr></label><input type="text" class="input-text form-control"
                        name="shipping_first_name" id="shipping_first_name" placeholder="" value=""
                        autocomplete="given-name" autofocus="autofocus"></p>


                <p class="form-row validate-required" id="shipping_last_name_field" data-priority="20">
                    <label for="shipping_last_name" class="control-label">Last name <abbr class="required"
                            title="required">*</abbr></label><input type="text" class="input-text form-control"
                        name="shipping_last_name" id="shipping_last_name" placeholder="" value=""
                        autocomplete="family-name"></p>

                <p class="form-row validate-required" id="shipping_address_1_field" data-priority="50">
                    <label for="shipping_address_1" class="control-label">Street address <abbr class="required"
                            title="required">*</abbr></label><input type="text" class="input-text form-control"
                        name="shipping_address_1" id="shipping_address_1" placeholder="House number and street name"
                        value="" autocomplete="address-line1"></p>


                <p class="form-row form-group" id="shipping_address_2_field" data-priority="60"><input type="text"
                        class="input-text form-control" name="shipping_address_2" id="shipping_address_2"
                        placeholder="Apartment, suite, unit etc. (optional)" value="" autocomplete="address-line2">
                </p>


                <p class="form-row validate-required" id="shipping_city_field" data-priority="70"
                    data-o_class="form-row validate-required"><label for="shipping_city" class="control-label">Town /
                        City <abbr class="required" title="required">*</abbr></label><input type="text"
                        class="input-text form-control" name="shipping_city" id="shipping_city" placeholder="" value=""
                        autocomplete="address-level2"></p>


                <p class="form-row invalid-required-field" id="shipping_state_field" data-priority="80"
                    data-o_class="form-row invalid-required-field">
                    <label for="shipping_state" class="control-label">State <abbr class="required"
                            title="required">*</abbr></label><select name="shipping_state" id="shipping_state"
                        class="state_select form-control select2-hidden-accessible" autocomplete="address-level1"
                        data-placeholder="" tabindex="-1" aria-hidden="true">
                        <option value="">Select an option…</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                        <option value="AA">Armed Forces (AA)</option>
                        <option value="AE">Armed Forces (AE)</option>
                        <option value="AP">Armed Forces (AP)</option>
                    </select><span class="select2 select2-container select2-container--default" dir="ltr"
                        style="width: 100%;"><span class="selection"><span
                                class="select2-selection select2-selection--single" aria-haspopup="true"
                                aria-expanded="false" tabindex="0" aria-labelledby="select2-shipping_state-container"
                                role="combobox"><span class="select2-selection__rendered"
                                    id="select2-shipping_state-container" role="textbox" aria-readonly="true"><span
                                        class="select2-selection__placeholder"></span></span><span
                                    class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                            aria-hidden="true"></span></span></p>


                <p class="form-row validate-postcode" id="shipping_postcode_field" data-priority="90"
                    data-o_class="form-row validate-postcode"><label for="shipping_postcode" class="control-label">ZIP
                        <abbr class="required" title="required">*</abbr></label><input type="text"
                        class="input-text form-control" name="shipping_postcode" id="shipping_postcode" placeholder=""
                        value="" autocomplete="postal-code"></p>


            </div>



            <p class="form-row form-group" id="order_comments_field" data-priority=""><label for="order_comments"
                    class="control-label">Order notes</label><textarea name="order_comments"
                    class="input-text form-control" id="order_comments"
                    placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
            </p>



        </div><!-- shipping-fields -->


        <h3 id="order_review_heading">Your order</h3>
        <div id="order_review" class="clearfix">

            <table class="shop_table">
                <thead>
                    <tr>
                        <th class="product-name">Product</th>
                        <th class="product-total">Total</th>
                    </tr>
                </thead>
                <tfoot>

                    <!-- just some empty space -->

                    <tr class="cart-subtotal">
                        <th>Cart Subtotal</th>
                        <td><span class="price-amount amount"><span class="price-currencySymbol">$</span>130</span></td>
                    </tr>
                    <tr class="shipping">
                        <th>Shipping and Handling</th>
                        <td>
                            Free shipping <input type="hidden" name="shipping_method[0]" data-index="0"
                                id="shipping_method_0" value="free_shipping:4" class="shipping_method">
</td>
                    </tr>

                    <tr class="order-total">
                        <th>Order Total</th>
                        <td><strong><span class="price-amount amount"><span
                                        class="price-currencySymbol">$</span>130</span></strong> </td>
                    </tr>


                </tfoot>
                <tbody>
                    <tr class="cart_item">
                        <td class="product-name">
                            Swing Chains <strong class="product-quantity">× 2</strong> </td>
                        <td class="product-total">
                            <span class="price-amount amount"><span class="price-currencySymbol">$</span>130</span>
                        </td>
                    </tr>
                </tbody>
            </table>


            <div id="payment">
                <ul class="payment_methods methods list-group">
                    <li class="list-group-item payment_method_cod">
                        <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method"
                            value="cod" checked="checked" data-order_button_text="" onclick="checkFunction()">
                        <label for="payment_method_cod">Cash on Pickup </label>
                        <div class="alert payment_method_cod" id="payment_method_cod1">
                            <p>Pay with cash upon pickup at our store:<br>
                                Helmuth Builders<br>
                                121 Carpenter Lane | Harrisonburg, VA 22801<br>
                                540-833-2276</p>
                        </div>
                    </li>
                    <li class="list-group-item payment_method_paypal">
                        <input  id="payment_method_paypal" type="radio" class="input-radio"
                            name="payment_method" value="paypal" data-order_button_text="Proceed to PayPal" onclick="checkFunction()">
                        <label for="payment_method_paypal">PayPal   </label>
                        <div class="alert payment_method_paypal" id="payment_method_paypal1" style="display:none">
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                        </div>
                    </li>
                </ul>

                <div class="clearfix"></div>

            </div>
            <div class="form-row place-order">
			<input type="submit" class="btn btn-primary btn-block pull-right alt" name="checkout_place_order" id="place_order" value="Place order" data-value="Place order">
		
		</div>


        </div>

    </div><!-- main -->
</div><!--  content -->
<?php
include("footer.php");
?>