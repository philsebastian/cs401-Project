
<div class="contain">
    <form name="signupForm" action="<?= URLROOT ?>signup/addnew/" method="POST">
        <label class="grouplabel" for="accounttype">Account Type</label>
        <div name="accounttype" class="container-well">
            <div class="form-row">
                <div class="col-15">
                    <label for="radiogroup">Select:</label>
                </div>
                <div class="col-50">
                    <div class="input-group" name="radiogroup">
                        <?php
                        foreach($data['permissions'] as $permission => $id)
                        {
                            $active = "";
                            $checked = "";

                            if (isset($data['permissionlevel']))
                            {
                                if ($data['permissionlevel'] == $id)
                                {
                                    $active = "active";
                                    $checked = "checked=\"\"";
                                }
                            }
                            else
                            {
                                if ($id == 1)
                                {
                                    $active = "active";
                                    $checked = "checked=\"\"";
                                }
                            }

                            $options .= "<label class=\"radio-inline {$active}\"><input type=\"radio\" value=\"{$id}\" name=\"permissionlevel\" {$checked}>{$permission}</label>";
                        }
                        echo $options;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <label class="grouplabel" for="credentials">Email and Password</label>
        <?php
        if (isset($_SESSION['errorMessage']))
        {
            $message = "<div class=\"alert alert-danger\">{$_SESSION['errorMessage']}</div>";
            unset($_SESSION['errorMessage']);
            echo $message;
        }
        ?>
        <div name="credentials" class="container-well">
            <div class="form-row">
                <div class="col-15">
                    <label for="username">Email address:</label>
                </div>
                <div class="col-50">
                    <input type="email" name="username" value="<?= $data['username'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="col-15">
                    <label for="password">Password:</label>
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
                        <input type="password" name="confpassword" class="confirm" disabled onchange="checkPasswordMatch();"/>
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
                <div class="col-10">

                </div>
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
                <button name="submit" type="submit" class="btn btn-default">Submit</button>
            </div>
            <div class="col-50">
                Already have an account.
                <a href="<?= URLROOT ?>login/" class="text-primary">Sign in.</a>
            </div>
        </div>
    </form>
</div>