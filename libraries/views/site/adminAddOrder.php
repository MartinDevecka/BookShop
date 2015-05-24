<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";       
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}   

?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/admin/addorder" enctype="multipart/form-data"> 
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
                Order date (YYYY-MM-DD):
            </td>           
            <td>
                <input class="form-control" type="date" name="order_date"/> 
            </td>
        </tr>
        <tr>
            <td width="30%">
                Payment type:
            </td>           
            <td>
                <input class="form-control" type="text" name="order_payment_type"/> 
            </td>
        </tr>
        <tr>
            <td width="30%">
               Payment date (YYYY-MM-DD):
            </td>           
            <td>
                <input class="form-control" type="date" name="order_payment_date"/> 
            </td>
        </tr>
        <tr>
            <td width="30%">
                Order paid (1 or 0):
            </td>           
            <td>
                <input class="form-control" type="number" name="order_paid" min="0" max="1"/> 
            </td>
        </tr>     
        <tr>
            <td width="30%">
                Order price:
            </td>           
            <td>
                <input class="form-control" type="number" step="any" name="order_price"/> 
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




