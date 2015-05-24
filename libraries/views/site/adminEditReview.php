<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/admin/savereview" enctype="multipart/form-data"> 
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
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
                User:
            </td>                   
            <td>
                <?php echo $data['users']; ?>                
            </td>                                    
        </tr>          
        <tr>
            <td width="30%">
                Text review:
            </td>           
            <td>
                <textarea name="book_review"><?php echo $data['review']['book_review']; ?></textarea>                
            </td>
        </tr>       
        <tr>
            <td width="30%">
                Date:
            </td>           
            <td>
                <input type="date" name="book_review_date" value="<?php echo $data['review']['book_review_date']; ?>"/>                
            </td>
        </tr>
        <tr>
            <td width="30%">
                Numeric review:
            </td>           
            <td>
                <input type="number" name="book_review_rate" value="<?php echo $data['review']['book_review_rate']; ?>"/>                
            </td>
        </tr>      
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>     
        <tr>
            <td width="30%">
                <input type="hidden" name="id_books_reviews" value="<?php echo $data['review']['id_books_reviews']; ?>"/>
                <button type="submit" class="btn btn-success">Save</button>
            </td>           
            <td>
                <a href="<?= $this->app->getBaseUrl() ?>/admin/findreview" class="btn btn-danger" role="button">Cancel</a> 
            </td>
        </tr>
    </table>               
</form>






