<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>admin/saveuser" enctype="multipart/form-data"> 
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <tr>
            <td width="30%">
                Name:
            </td>                   
            <td>
                <input type="text" name="user_name" value="<?php echo $data['user']['user_name']; ?>"/>
            </td>                                    
        </tr>
        <tr>
            <td width="30%">
                Password:
            </td>          
            <td>
                <input type="password" name="user_password" value="<?php echo $data['user']['user_password']; ?>"/>
            </td>
        </tr>   
        <tr>
            <td width="30%">
                Email:
            </td>          
            <td>
                <input type="text" name="user_email" value="<?php echo $data['user']['user_email']; ?>"/>
            </td>
        </tr>  
        <tr>
            <td width="30%">
                Phone:
            </td>          
            <td>
                <input type="text" name="user_phone" value="<?php echo $data['user']['user_phone']; ?>"/>
            </td>
        </tr>  
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>     
        <tr>
            <td width="30%">
                <input type="hidden" name="id_user" value="<?php echo $data['user']['id_user']; ?>"/>
                <button type="submit" class="btn btn-success">Save</button>
            </td>           
            <td>
                <a href="<?= $this->app->getBaseUrl() ?>/admin/finduser" class="btn btn-danger" role="button">Cancel</a> 
            </td>
        </tr>
    </table>               
</form>






