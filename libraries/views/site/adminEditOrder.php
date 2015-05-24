<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/admin/saveorder" enctype="multipart/form-data"> 
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <tr>
            <td width="30%">
                User:
            </td>                   
            <td>
                <?php echo $data['users']; ?>                
            </td>                                    
        </tr>     
        <tr>
            <td width="30%">
                Order date:
            </td>           
            <td>
                <input type="date" name="order_date" value="<?php echo $data['order']['order_date']; ?>"/>                
            </td>
        </tr>
        <tr>
            <td width="30%">
                Payment type:
            </td>           
            <td>
                <input type="text" name="order_payment_type" value="<?php echo $data['order']['order_payment_type']; ?>"/>                 
            </td>
        </tr>
        <tr>
            <td width="30%">
                Payment date:
            </td>           
            <td>
                <input type="date" name="order_payment_date" value="<?php echo $data['order']['order_payment_date']; ?>"/>                
            </td>
        </tr>
        <tr>
            <td width="30%">
                Order paid:
            </td>           
            <td>
                <input type="number" name="order_paid" value="<?php echo $data['order']['order_paid']; ?>"/>                
            </td>
        </tr>  
        <tr>
            <td width="30%">
                Total price:
            </td>           
            <td>
                <input type="number" step ="any" name="order_price" value="<?php echo $data['order']['order_price']; ?>"/>                
            </td>
        </tr>     
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>     
        <tr>
            <td width="30%">
                <input type="hidden" name="id_order" value="<?php echo $data['order']['id_order']; ?>"/>
                <button type="submit" class="btn btn-success">Save</button>
            </td>           
            <td>
                <a href="<?= $this->app->getBaseUrl() ?>/admin/findorder" class="btn btn-danger" role="button">Cancel</a> 
            </td>
        </tr>
    </table>               
</form>




