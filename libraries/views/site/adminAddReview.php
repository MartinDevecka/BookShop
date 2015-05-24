<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";       
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}   

?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/admin/addreview" enctype="multipart/form-data"> 
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
                Book:
            </td>          
            <td>
                <?php echo $data['books']; ?> 
            </td>
        </tr>
        <tr>
            <td width="30%">
                Text Review:
            </td>           
            <td>
                <textarea class="form-control" name="book_review"></textarea>
            </td>
        </tr>       
        <tr>
            <td width="30%">
                Numeric Review (1 - good, 2 - bad):
            </td>           
            <td>
                <input class="form-control" type="number" name="book_review_rate" min="1" max="2"/> 
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




