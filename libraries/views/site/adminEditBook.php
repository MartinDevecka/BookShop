<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>admin/savebook" enctype="multipart/form-data"> 
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <tr>
            <td width="30%">
                Category:
            </td>                   
            <td>
                <?php echo $data['categories']; ?>                
            </td>                                    
        </tr>
        <tr>
            <td width="30%">
                Author:
            </td>          
            <td>
                <?php echo $data['authors']; ?>               
            </td>
        </tr>
        <tr>
            <td width="30%">
                Title:
            </td>           
            <td>
                <input type="text" name="book_title" value="<?php echo $data['book']['book_title']; ?>"/>                
            </td>
        </tr>
        <tr>
            <td width="30%">
                ISBN:
            </td>           
            <td>
                <input type="text" name="book_ISBN" value="<?php echo $data['book']['book_ISBN']; ?>"/>                 
            </td>
        </tr>
        <tr>
            <td width="30%">
                Price:
            </td>           
            <td>
                <input type="text" name="book_price" value="<?php echo $data['book']['book_price']; ?>"/>                
            </td>
        </tr>
        <tr>
            <td width="30%">
                Discount:
            </td>           
            <td>
                <input type="text" name="book_discount" value="<?php echo $data['book']['book_discount']; ?>"/>                
            </td>
        </tr>
        <tr>
            <td width="30%">
                Subject:
            </td>           
            <td>
                <input type="text" name="book_subject" value="<?php echo $data['book']['book_subject']; ?>"/>               
            </td>
        </tr>
        <tr>
            <td width="30%">
                Image:
            </td>           
            <td> 
                <input type="text" name="book_image" value="<?php echo $data['book']['book_image']; ?>"/>
            </td>
        </tr>
        <tr>
            <td width="30%">
                Path:
            </td>           
            <td>    
                <input type="text" name="book_file" value="<?php echo $data['book']['book_file']; ?>"/> 
            </td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>     
        <tr>
            <td width="30%">
                <input type="hidden" name="id_book" value="<?php echo $data['book']['id_book']; ?>"/>
                <button type="submit" class="btn btn-success">Save</button>
            </td>           
            <td>
                <a href="<?= $this->app->getBaseUrl() ?>/admin/findbook" class="btn btn-danger" role="button">Cancel</a> 
            </td>
        </tr>
    </table>               
</form>


