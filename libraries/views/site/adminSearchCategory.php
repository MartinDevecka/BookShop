<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>

<script type="text/javascript">
    function ConfirmDelete() {
        var d = confirm('Do you really want to delete data?');
        if (d == false) {
            return false;
        }
    }
</script>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>admin/findcategory">
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <thead>
            <tr>
                <th width="30%">
                    Name
                </th>
                <th width="30%">
                    Image
                </th>               
                <th width="15%"></th>
                <th width="15%"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['category_select_all'] as $select) : ?>
                <tr>
                    <td>
                        <?php echo $select['category_name']; ?>                     
                    </td>
                    <td>
                        <?php echo $select['category_image']; ?>
                    </td>             
                    <td>
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/editcategory/<?= $select['id_category']; ?>" class="btn btn-success" role="button">Edit</a>
                    </td>
                    <td>                        
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/deletecategory/<?= $select['id_category']; ?>" class="btn btn-danger" role="button" onClick="return ConfirmDelete();">Delete</a>
                    </td>
                <tr>
            <?php endforeach; ?>
        </tbody>
    </table>	
</form>






