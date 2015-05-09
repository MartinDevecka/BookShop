<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";       
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}   

?>

<script type="text/javascript">
function ConfirmDelete(){
	var d = confirm('Do you really want to delete data?');
	if(d == false){
		return false;
	}
}
</script>
<form method="post" action="<?= $this->app->getBaseUrl(); ?>/admin/editbook">
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
					<?php foreach($data['book_select'] as $select) : ?>
						<tr>
							<td>
								<?php echo $select['id_category']; ?>
							</td>
							<td>
								<?php echo $select['id_author']; ?>
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
								<?php echo $select['book_path']; ?>
							</td>
							<td>
								<form method="post" action="<?= $this->app->getBaseUrl(); ?>/admin/editdeletebook">
									<input type="hidden" name="ci" 
									value="<?php echo $select["id_book"]; ?>" />
									<input type="hidden" name="action" value="edit" />
									<input type="submit" value="Edit" />
								</form> 
							</td>
							<td>
								<form method="post" action="<?= $this->app->getBaseUrl(); ?>/admin/editdeletebook" 
								onSubmit="return ConfirmDelete();">
									<input type="hidden" name="ci" 
									value="<?php echo $select["id_book"]; ?>" />
									<input type="hidden" name="action" value="delete" />
									<input type="submit" value="Delete" />
								</form>
							</td>
						<tr>
					<?php endforeach; ?>
				</tbody>
			</table><br/>
			<!--<a href="update.php" class="link-btn">Add Contact</a>-->	
    </form>




