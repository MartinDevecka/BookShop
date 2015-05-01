<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/user/login"> 
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <tr>
            <td width="30%">
                E-mail:
            </td>          
            <td>
                <input class="form-control" type="text" name="email"/> 
            </td>
        </tr>
        <tr>
            <td width="30%">
                Password:
            </td>           
            <td>
                <input class="form-control" type="password" name="password"/> 
            </td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <!--<tr>
            <td width="30%"></td>           
            <td>
                <div class="checkbox">
                    <label><input type="checkbox">Remember me</label>
                </div> 
            </td>
        </tr>-->
        <tr>
            <td width="30%">
                <button type="submit" class="btn btn-success">Log in</button> 
                <!--<input type="submit" value="Submit"/>--> 
            </td>           
            <td>              
                <a href="<?= $this->app->getBaseUrl(); ?>/user/register" class="btn btn-danger" role="button">Or register here</a>          
            </td>
        </tr>
    </table>               
</form>
