<h1>Register</h1>
<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>user/register#showRedirect">
    <div class="input-group col-lg-4 col-lg-offset-4" style="padding-bottom: 5px;">
        <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Full name</span>
        <input type="text" class="form-control" placeholder="Name..." name="name" aria-describedby="basic-addon1">
    </div>    
    <div class="input-group col-lg-4 col-lg-offset-4" style="padding-bottom: 5px;">
        <span class="input-group-addon input-group-addon-custom" id="basic-addon1">E-mail</span>
        <input type="email" class="form-control" placeholder="name@webhosting.com" name="email" aria-describedby="basic-addon1">
    </div>
    <div class="input-group col-lg-4 col-lg-offset-4" style="padding-bottom: 5px;">
        <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Password</span>
        <input type="password" class="form-control" placeholder="Type your password..." name="password" aria-describedby="basic-addon1">
    </div>
    <div class="input-group col-lg-4 col-lg-offset-4" style="padding-bottom: 5px;">
        <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Phone</span>
        <input type="text" class="form-control" placeholder="+XXX/XXXXXXXXX" name="phone" aria-describedby="basic-addon1">
    </div>
    <div class="col-lg-4 col-lg-offset-4" style="padding-right: 0; padding-bottom: 5px;">
        <div class="btn-group pull-right" role="group" aria-label="...">
            <button type="submit" class="btn btn-success">Register</button>
            <button class="btn btn-default" disabled="true" style="opacity: 1;">OR</button>
            <a href="<?= $this->app->getBaseUrl(); ?>" class="btn btn-info" role="button">Proceed to home page</a>
        </div>
    </div>
</form>

