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
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/admin/findbook">
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <thead>
            <tr>
                <th>
                    Category
                </th>
                <th>
                    Author
                </th>
                <th>
                    Title
                </th>
                <th>
                    ISBN
                </th>
                <th>
                    Price
                </th>
                <th>
                    Discount
                </th>
                <th>
                    Subject
                </th>
                <th>
                    Image
                </th>
                <th>
                    Path
                </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['book_select_all'] as $select) : ?>
                <tr>
                    <td>
                        <?php echo Category::categoryName($select['id_category']); ?>                     
                    </td>
                    <td>
                        <?php echo Author::authorName($select['id_author']); ?>
                    </td>
                    <td>
                        <?php echo $select['book_title']; ?>
                    </td>
                    <td>
                        <?php echo $select['book_ISBN']; ?>
                    </td>
                    <td>
                        <?php echo $select['book_price']; ?>
                    </td>
                    <td>
                        <?php echo $select['book_discount']; ?>
                    </td>
                    <td>
                        <?php echo $select['book_subject']; ?>
                    </td>
                    <td>
                        <?php echo $select['book_image']; ?>
                    </td>
                    <td>
                        <?php echo $select['book_file']; ?>
                    </td>
                    <td>
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/editbook/<?= $select['id_book']; ?>" class="btn btn-success" role="button">Edit</a>
                    </td>
                    <td>                        
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/deletebook/<?= $select['id_book']; ?>" class="btn btn-danger" role="button" onClick="return ConfirmDelete();">Delete</a>
                    </td>
                <tr>
            <?php endforeach; ?>
        </tbody>
    </table>	
</form>




