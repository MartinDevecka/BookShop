
<?php
if(!empty($data['error'])){
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
} 
if(!empty($data['success'])){
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
} 
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/user/register">
    Full name:
    <input class="form-control" type="text" name="name"/>
    Password:
    <input class="form-control" type="password" name="password"/>
    E-mail:
    <input class="form-control" type="email" name="email"/>
    Phone:
    <input class="form-control" type="text" name="phone"/>   
    </br>   
    <input class="btn-danger" type="submit" value="Submit"/>
</form>

