            <div class="container-fluid">
                <h3 class="text-center">
                    Sign Up
                </h3>
                <form class="form-horizontal" name="signupForm" action="<?= URLROOT ?>signup/addnew/" method="POST">
                    <label class="grouplabel" for="accounttype">Account Type</label>

                    <div name="accounttype" class="well">
                        <div class="form-group">

                            <label class="control-label col-sm-2" for="radiogroup">Select:</label>
                            <div class="col-xs-4">
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

                    <label class="grouplabel" for="credentials">
                        Email and Password
                    </label>
                    <?php
                    if (isset($_SESSION['errorMessage']))
                    {
                        $message = "<div class=\"alert alert-danger\">{$_SESSION['errorMessage']}</div>";
                        unset($_SESSION['errorMessage']);
                        echo $message;
                    }
                    ?>
                    <div name="credentials" class="well">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="username">Email address:</label>
                            <div class="col-xs-5">
                                <input type="email" name="username" class="form-control" value="<?= $data['username'] ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="password">Password:</label>
                            <div class="col-xs-3">
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <label class="control-label col-sm-2" for="password">Confirm Password:</label>
                            <div class="col-xs-3">
                                <input type="password" name="confpassword" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-offset-2">
                            <span class="help-block">Passwords need to contain at least one number, one lower-case letter, one upper-case letter, one special character, and be at least eight characters long.</span>
                        </div>
                    </div>
                    <label class="grouplabel" for="address">Personal and Address Information</label>

                    <div name="address" class="well">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="street">First Name:</label>
                            <div class="col-xs-3">
                                <input type="text" name="firstname" class="form-control" value="<?= $data['firstname'] ?>" />
                            </div>
                            <label class="control-label col-sm-2" for="street">Last Name:</label>
                            <div class="col-xs-4">
                                <input type="text" name="lastname" class="form-control" value="<?= $data['lastname'] ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="street">Street address:</label>
                            <div class="col-xs-9">
                                <input type="text" name="street" class="form-control" value="<?= $data['street'] ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="city">City:</label>
                            <div class="col-xs-3">
                                <input type="text" name="city" class="form-control" value="<?= $data['city'] ?>" />
                            </div>
                            <label class="control-label col-sm-1" for="state">State:</label>
                            <div class="col-xs-1">
                                <input type="text" name="state" class="form-control" value="<?= $data['state'] ?>" />
                            </div>
                            <label class="control-label col-sm-2" for="zip">Zip Code:</label>
                            <div class="col-xs-2">
                                <input type="number" name="zip" class="form-control" value="<?= $data['zip'] ?>" />
                            </div>
                        </div>                      
                    </div>

                    <div class="form-group">
                        <div class="col-xs-1">
                            <button name="submit" type="submit" class="btn btn-default">Submit</button>
                        </div>
                        <div class="col-xs-3">
                            Already have an account.
                            <a href="<?= URLROOT ?>login/" class="text-primary">Sign in.</a>
                        </div>
                    </div>

                </form>
            </div>