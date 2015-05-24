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
<form method="post" action="<?= $this->app->getBaseUrl(); ?>admin/findauthor">
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <thead>
            <tr>
                <th width="30%">
                    Name
                </th>                             
                <th width="15%"></th>
                <th width="15%"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['author_select_all'] as $select) : ?>
                <tr>
                    <td>
                        <?php echo $select['author_name']; ?>                     
                    </td>                             
                    <td>
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/editauthor/<?= $select['id_author']; ?>" class="btn btn-success" role="button">Edit</a>
                    </td>
                    <td>                        
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/deleteauthor/<?= $select['id_author']; ?>" class="btn btn-danger" role="button" onClick="return ConfirmDelete();">Delete</a>
                    </td>
                <tr>
            <?php endforeach; ?>
        </tbody>
    </table>	
</form>








