<div class="container-fluid">
    <h3 class="text-center">
        Account Information
    </h3>
    <form class="form-horizontal" name="signupForm" action="<?= URLROOT ?>students/account/update" method="POST">
        <label class="grouplabel" for="credentials">
            Email and Password
        </label>
        <div name="credentials" class="well">
            <div class="form-group">
                <label class="control-label col-sm-2" for="username">Email address:</label>
                <div class="col-xs-3">
                    <p name="username" class="form-control-static">
                        <?= $data['username']?>
                    </p>
                </div>
            </div>
        </div>
        <label class="grouplabel" for="address">Address Information</label>

        <div name="name" class="well">
            <div class="form-group">
                <label class="control-label col-sm-2" for="firstname">First Name:</label>
                <div class="col-xs-3">
                    <input type="text" name="firstname" class="form-control" value="<?= $data['firstname'] ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="lastname">Last Name:</label>
                <div class="col-xs-3">
                    <input type="text" name="city" class="form-control" value="<?= $data['lastname'] ?>" />
                </div>
            </div>
        </div>

        <div name="address" class="well">
            <div class="form-group">
                <label class="control-label col-sm-2" for="street">Street address:</label>
                <div class="col-xs-3">
                    <input type="text" name="street" class="form-control" value="<?= $data['street'] ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="city">City:</label>
                <div class="col-xs-3">
                    <input type="text" name="city" class="form-control" value="<?= $data['city'] ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="state">State:</label>
                <div class="col-xs-3">
                    <input type="text" name="state" class="form-control" value="<?= $data['state'] ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="zip">Zip Code:</label>
                <div class="col-xs-3">
                    <input type="number" name="zip" class="form-control" value="<?= $data['zip'] ?>" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-1">
                <button name="submit" type="submit" class="btn btn-default">Update</button>
            </div>
        </div>

    </form>
</div>
