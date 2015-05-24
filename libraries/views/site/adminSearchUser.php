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
        var d = confirm('Do you really want to delete user?');
        if (d == false) {
            return false;
        }
    }
</script>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>admin/finduser">
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <thead>
            <tr>
                <th width="20%">
                    Name
                </th>
                <th width="20%">
                    Password
                </th>   
                <th width="20%">
                    Email
                </th> 
                <th width="20%">
                    Phone
                </th> 
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['user_select_all'] as $select) : ?>
                <tr>
                    <td>
                        <?php echo $select['user_name']; ?>                     
                    </td>
                    <td>
                        <?php echo $select['user_password']; ?>
                    </td>   
                    <td>
                        <?php echo $select['user_email']; ?>
                    </td> 
                    <td>
                        <?php echo $select['user_phone']; ?>
                    </td> 
                    <td>
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/edituser/<?= $select['id_user']; ?>" class="btn btn-success" role="button">Edit</a>
                    </td>
                    <td>                        
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/deleteuser/<?= $select['id_user']; ?>" class="btn btn-danger" role="button" onClick="return ConfirmDelete();">Delete</a>
                    </td>
                <tr>
            <?php endforeach; ?>
        </tbody>
    </table>	
</form>








