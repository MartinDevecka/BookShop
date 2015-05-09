<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";       
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}   

?>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/admin/addbook" enctype="multipart/form-data"> 
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
                <input class="form-control" type="text" name="title"/> 
            </td>
        </tr>
        <tr>
            <td width="30%">
                ISBN:
            </td>           
            <td>
                <input class="form-control" type="text" name="isbn"/> 
            </td>
        </tr>
        <tr>
            <td width="30%">
                Price:
            </td>           
            <td>
                <input class="form-control" type="text" name="price"/> 
            </td>
        </tr>
        <tr>
            <td width="30%">
                Discount:
            </td>           
            <td>
                <input class="form-control" type="text" name="discount"/> 
            </td>
        </tr>
        <tr>
            <td width="30%">
                Subject:
            </td>           
            <td>
                <input class="form-control" type="text" name="subject"/> 
            </td>
        </tr>
        <tr>
            <td width="30%">
                Image:
            </td>           
            <td> 
                <input class="form-control" type="text" name="image"/> 
                <!--<input class="btn btn-success" type="file" name="image" id="image" value="Add image"/>--> 
            </td>
        </tr>
        <tr>
            <td width="30%">
                Path:
            </td>           
            <td>    
                <input class="form-control" type="text" name="path"/> 
                <!--<input class="btn btn-success" type="file" name="path" id="path" value="Add book"/>--> 
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


