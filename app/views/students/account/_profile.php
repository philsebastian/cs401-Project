
<div class="contain">
    <?php
    if (isset($_SESSION['errorMessage']))
    {
        $message = "<div class=\"alert alert-danger\">{$_SESSION['errorMessage']}</div>";
        unset($_SESSION['errorMessage']);
        echo $message;
    }
    ?>
    <label class="grouplabel" for="account">Account Information</label>
    <div name="account" class="container-well">
        <div class="form-row">
            <div class="col-15">
                <label for="username">Email address:</label>
            </div>
            <div class="col-50">
                <label class="softlabel" name="username">
                    <?= $data['username']?>
                </label>
            </div>
        </div>
    </div>
    <form name="resetpassword" action="<?= STUDENTROOT ?>account/reset/" method="POST">
        <label class="grouplabel" for="credentials">Change Password</label>
        <div name="credentials" class="container-well">
            <div class="form-row">
                <div class="col-15">
                    <label for="password">New Password:</label>
                </div>
                <div class="col-50">
                    <div class="inner-addon right-addon">
                        <span class="match glyphicon"></span>
                        <input type="password" name="password" class="confirm" onchange="checkPasswordMatch();" />
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-15">
                    <label for="password">Confirm Password:</label>
                </div>
                <div class="col-50">
                    <div class="inner-addon right-addon">
                        <span class="match glyphicon"></span>
                        <input type="password" name="confpassword" class="confirm" disabled onchange="checkPasswordMatch();" />
                    </div>
                </div>

            </div>
            <div class="form-row">
                <div class="col-15"></div>
                <div class="col-50">
                    <span id="passwordHelp" class="help-block alert">Passwords need to contain at least one number, one lower-case letter, one upper-case letter, one special character, and be at least eight characters long.</span>
                </div>
            </div>
        </div>
        <div class="form-row row-space">
            <div class="col-15">
                <button name="reset" type="submit" class="btn btn-default">Change password</button>
            </div>
        </div>
    </form>
    <form name="update" action="<?= STUDENTROOT ?>account/update/" method="POST">
        <label class="grouplabel" for="address">Personal and Address Information</label>
        <div name="address" class="container-well">
            <div class="form-row">
                <div class="col-15">
                    <label for="street">First Name:</label>
                </div>
                <div class="col-50">
                    <input type="text" name="firstname" value="<?= $data['firstname'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="col-15">
                    <label for="street">Last Name:</label>
                </div>
                <div class="col-50">
                    <input type="text" name="lastname" value="<?= $data['lastname'] ?>" />
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
        <div class="form-row row-space">
            <div class="col-15">
                <button name="submit" type="submit" class="btn btn-default">Update Info</button>
            </div>
        </div>
    </form>
</div>