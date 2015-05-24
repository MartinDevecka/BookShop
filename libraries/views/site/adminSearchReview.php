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
<form method="post" action="<?= $this->app->getBaseUrl(); ?>admin/findreview">
    <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <thead>
            <tr>
                <th>
                    Book
                </th>
                <th>
                    User
                </th>
                <th>
                    Text Review
                </th>
                <th>
                    Date
                </th>
                <th>
                    Numeric Review
                </th>              
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['review_select_all'] as $select) : ?>
                <tr>                   
                    <td>
                        <?php echo Book::bookTitle($select['id_book']); ?>
                    </td>
                    <td>
                        <?php echo User::userEmail($select['id_user']); ?>                     
                    </td>
                    <td>
                        <?php echo $select['book_review']; ?>
                    </td>
                    <td>
                        <?php echo $select['book_review_date']; ?>
                    </td>
                    <td>
                        <?php echo $select['book_review_rate']; ?>
                    </td>                   
                    <td>
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/editreview/<?= $select['id_books_reviews']; ?>" class="btn btn-success" role="button">Edit</a>
                    </td>
                    <td>                        
                        <a href="<?= $this->app->getBaseUrl(); ?>/admin/deletereview/<?= $select['id_books_reviews']; ?>" class="btn btn-danger" role="button" onClick="return ConfirmDelete();">Delete</a>
                    </td>
                <tr>
            <?php endforeach; ?>
        </tbody>
    </table>	
</form>






