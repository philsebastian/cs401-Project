
<div class="contain">
    <div class="row-space">
        <p class="help-block">Enter information below to add a new payment method.</p>
    </div>
    <form name="newPaymentInfo" action="<?= STUDENTROOT ?> account/addnewpayment" method="POST">
        <label class="grouplabel" for="billinginfo">Billing Information</label>

        <div name="billinginfo" class="container-well">
            <div class="form-row">
                <div class="col-15">
                    <label for="fullname">Full Name:</label>
                </div>
                <div class="col-50">
                    <input type="text" name="fullname" value="<?= $data['fullname'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="col-15">
                    <label for="email">Email address:</label>
                </div>
                <div class="col-50">
                    <input type="email" name="email" value="<?= $data['email'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="col-15">
                    <label for="street">Street address:</label>
                </div>
                <div class="col-50">
                    <input type="text" name="street" value="<?= $data['street'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="col-15">
                    <label for="city">City:</label>
                </div>
                <div class="col-50">
                    <input type="text" name="city" value="<?= $data['city'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="col-15">
                    <label for="state">State:</label>
                </div>
                <div class="col-10">
                    <input type="text" name="state" value="<?= $data['state'] ?>" />
                </div>
                <div class="col-10"></div>
                <div class="col-15">
                    <label for="zip">Zip Code:</label>
                </div>
                <div class="col-15">
                    <input type="number" name="zip" value="<?= $data['zip'] ?>" />
                </div>
            </div>
        </div>

        <label class="grouplabel" for="payment">Payment Account Information</label>

        <div name="payment" class="container-well">
            <div class="form-row">
                <div class="col-15">
                    <label for="billname">Name on Card:</label>
                </div>
                <div class="col-50">
                    <input type="text" name="billname" value="" />
                </div>
            </div>
            <div class="form-row">
                <div class="col-15">
                    <label for="ccnum">Credit Card number:</label>
                </div>
                <div class="col-50">
                    <input type="text" name="ccnum" value="" />
                </div>
            </div>
            <div name="expiration" class="form-row">
                <div class="col-15">
                    <label for="expmonth">Expiration Month:</label>
                </div>
                <div class="col-10">
                    <input type="number" name="expmonth" value="" />
                </div>
                <div class="col-10"></div>
                <div class="col-20">
                    <label for="expyear">Expiration Year:</label>
                </div>
                <div class="col-10">
                    <input type="number" name="expyear" value="" />
                </div>
            </div>
            <div class="form-row">
                <div class="col-15">
                    <label for="cvv">CVV:</label>
                </div>
                <div class="col-10">
                    <input type="number" name="cvv" value="" />
                </div>
                <div class="col-10"></div>
            </div>
        </div>
        <div class="form-row row-space">
            <button name="submit" type="submit" class="btn btn-default">Save</button>
        </div>
    </form>
</div>
