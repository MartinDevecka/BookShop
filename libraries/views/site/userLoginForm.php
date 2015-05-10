<h1>Log in</h1>
<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";       
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>user/login#showRedirect">
    <div class="input-group col-lg-4 col-lg-offset-4">
        <span class="input-group-addon input-group-addon-custom" id="basic-addon1">E-mail</span>
        <input type="email" class="form-control" name="email" placeholder="name@webhosting.com" aria-describedby="basic-addon1">
    </div>
    <div class="input-group col-lg-4 col-lg-offset-4">
        <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Password</span>
        <input type="password" class="form-control" name="password" placeholder="Type your password..." aria-describedby="basic-addon1">
    </div>
    <div class="col-lg-4 col-lg-offset-4" style="padding-right: 0;">
        <div class="btn-group pull-right" role="group" aria-label="...">
            <button type="submit" class="btn btn-success">Log in</button>
            <button class="btn btn-default" disabled="true" style="opacity: 1;">OR</button>
            <a href="<?= $this->app->getBaseUrl(); ?>user/register" class="btn btn-info" role="button">Register here</a>
        </div>
    </div>
</form>
