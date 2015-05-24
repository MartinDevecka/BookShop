<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";       
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}   

?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/admin/addauthor" enctype="multipart/form-data"> 
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <tr>
            <td width="30%">
                Author name:
            </td>                   
            <td>
                <input class="form-control" type="text" name="author_name"/> 
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






