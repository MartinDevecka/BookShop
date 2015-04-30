<?php
if(!empty($data['error'])){
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
} 
if(!empty($data['success'])){
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
} 
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/user/login"> 
    E-mail:
    <input class="form-control" type="email" name="email"/> 
    Password:
    <input class="form-control" type="password" name="password"/>      
    </br>   
    <input class="btn-danger" type="submit" value="Submit"/>   
</form>
<a href="<?= $this->app->getBaseUrl(); ?>/user/register">Or register please.</a>

