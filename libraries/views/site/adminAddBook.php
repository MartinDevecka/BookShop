<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";       
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}   

?>
<form action="<?= $this->app->getBaseUrl(); ?>/admin/addbook" method="post">
    <table>
        <tr>
            <td>Category</td><td><?php echo $data['categories']; ?></td>
        </tr>
        <tr>
            <td>Author</td><td><?php echo $data['authors']; ?></td>
        </tr>
        <tr>
            <td>Title</td><td><input type="text" name="title" /></td>
        </tr>
        <tr>
            <td>ISBN</td><td><input type="text" name="isbn" /></td>
        </tr>
        <tr>
            <td></td><td><input type="submit" /></td>
        </tr>
    </table>
</form>


