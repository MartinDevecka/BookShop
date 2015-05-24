<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";       
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}   

?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>book/addreview" enctype="multipart/form-data"> 
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">   
        <tr>
            <td width="30%">
                Book title:
            </td>           
            <td>
                <?= Book::bookTitle($data['id_book']) ?>
                <input type="hidden" name="id_book" value="<?php echo $data['id_book']; ?>"/>           
            </td>  
        </tr>
        <tr>
            <td width="30%">
                User:
            </td>           
            <td>
                <?= User::GetUserName($data['id_user']) ?>
                <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>"/>           
            </td>  
        </tr>
        <tr>
            <td width="30%">
                Text Review:
            </td>           
            <td>
                <input class="form-control" type="textarea" name="book_review"/> 
            </td>
        </tr>      
        <tr>
            <td width="30%">
                Numeric Review (1 - good, 2 - average, 3 - bad):
            </td>           
            <td>
                <input class="form-control" type="number" name="book_review_rate" min="1" max="3"/> 
            </td>
        </tr>   
        <tr style="margin-top: 100px">
            <td width="30%">              
            </td>           
            <td>
                <button type="submit" class="btn btn-success">Add</button> 
            </td>
        </tr>
    </table>               
</form>






