<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/admin/saveauthor" enctype="multipart/form-data"> 
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <tr>
            <td width="30%">
                Name:
            </td>                   
            <td>
                <input type="text" name="author_name" value="<?php echo $data['author']['author_name']; ?>"/>
            </td>                                    
        </tr>        
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>     
        <tr>
            <td width="30%">
                <input type="hidden" name="id_author" value="<?php echo $data['author']['id_author']; ?>"/>
                <button type="submit" class="btn btn-success">Save</button>
            </td>           
            <td>
                <a href="<?= $this->app->getBaseUrl() ?>/admin/findauthor" class="btn btn-danger" role="button">Cancel</a> 
            </td>
        </tr>
    </table>               
</form>






