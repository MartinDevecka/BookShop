
<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/user/register"> 
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <tr>
            <td width="30%">
                Full name:
            </td>          
            <td>
                <input class="form-control" type="text" name="name"/> 
            </td>
        </tr>
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
        <tr>
            <td width="30%">
                Phone:
            </td>           
            <td>
                <input class="form-control" type="text" name="phone"/> 
            </td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>     
        <tr>
            <td width="30%">
                <button type="submit" class="btn btn-success">Submit</button>
            </td>           
            <td>
                <a href="<?= $this->app->getBaseUrl(); ?>" class="btn btn-success" role="button">Or proceed to home page</a> 
            </td>
        </tr>
    </table>               
</form>

