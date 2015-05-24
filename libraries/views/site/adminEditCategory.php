<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>admin/savecategory" enctype="multipart/form-data"> 
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <tr>
            <td width="30%">
                Name:
            </td>                   
            <td>
                <input type="text" name="category_name" value="<?php echo $data['category']['category_name']; ?>"/>
            </td>                                    
        </tr>
        <tr>
            <td width="30%">
                Image:
            </td>          
            <td>
                <input type="text" name="category_image" value="<?php echo $data['category']['category_image']; ?>"/>
            </td>
        </tr>      
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>     
        <tr>
            <td width="30%">
                <input type="hidden" name="id_category" value="<?php echo $data['category']['id_category']; ?>"/>
                <button type="submit" class="btn btn-success">Save</button>
            </td>           
            <td>
                <a href="<?= $this->app->getBaseUrl() ?>/admin/findcategory" class="btn btn-danger" role="button">Cancel</a> 
            </td>
        </tr>
    </table>               
</form>




