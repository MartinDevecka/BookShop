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
<form method="post" action="<?= $this->app->getBaseUrl(); ?>admin/findorder">
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <thead>
            <tr>
                <th>
                    User
                </th>
                <th>
                    Order date
                </th>
                <th>
                    Payment type
                </th>
                <th>
                    Payment date
                </th>
                <th>
                    Order paid
                </th>     
                <th>
                    Total Price
                </th>  
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['order_select_all'] as $select) : ?>
                <tr>
                    <td>
                        <?php echo User::userEmail($select['id_user']); ?>                     
                    </td>                   
                    <td>
                        <?php echo $select['order_date']; ?>
                    </td>
                    <td>
                        <?php echo $select['order_payment_type']; ?>
                    </td>
                    <td>
                        <?php echo $select['order_payment_date']; ?>
                    </td>
                    <td>
                        <?php echo $select['order_paid']; ?>
                    </td>     
                    <td>
                        <?php echo $select['order_price']; ?>
                    </td>   
                    <td>
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/editorder/<?= $select['id_order']; ?>" class="btn btn-success" role="button">Edit</a>
                    </td>
                    <td>                        
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/deleteorder/<?= $select['id_order']; ?>" class="btn btn-danger" role="button" onClick="return ConfirmDelete();">Delete</a>
                    </td>
                <tr>
            <?php endforeach; ?>
        </tbody>
    </table>	
</form>






