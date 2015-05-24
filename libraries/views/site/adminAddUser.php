<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";       
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}   

?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>admin/adduser" enctype="multipart/form-data"> 
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <tr>
            <td width="20%">
                Name:
            </td>                   
            <td>
                <input class="form-control" type="text" name="user_name"/> 
            </td>                                    
        </tr>
        <tr>
            <td width="20%">
                Password:
            </td>          
            <td>
                <input class="form-control" type="password" name="user_password"/>
            </td>
        </tr>       
        <tr>
            <td width="20%">
                Email:
            </td>          
            <td>
                <input class="form-control" type="text" name="user_email"/>
            </td>
        </tr> 
        <tr>
            <td width="20%">
                Phone:
            </td>          
            <td>
                <input class="form-control" type="text" name="user_phone"/>
            </td>
        </tr> 
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>     
        <tr>
            <td width="30%">              
            </td>           
            <td>
                <button type="submit" class="btn btn-success">Add</button> 
            </td>
        </tr>
    </table>               
</form>





