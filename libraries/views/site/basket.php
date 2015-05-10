<div class="panel panel-default col-lg-8 col-lg-offset-2" style="padding-left: 0; padding-right: 0;">
        <!-- Default panel contents -->
        <div class="panel-heading">Basket</div>
        <?php
            if(isset($data['error']))
            {
                echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
            }
            else
            {
                $totalPrice = $data['totalPrice'];
                $bookCount = $data['bookCount'];
        ?>
        <div class="panel-body">
            <div id="categoriesList" class="btn-group col-lg-6 col-lg-offset-3" role="group" aria-label="...">
                <a href="<?= $this->app->getBaseUrl() ?>basket/basket#showRedirect" class="btn btn-info basketListItem" role="button">Basket</a>
                <a href="<?= $this->app->getBaseUrl() ?>basket/Payment#showRedirect" class="btn btn-default basketListItem" role="button">Payment</a>
                <a href="<?= $this->app->getBaseUrl() ?>basket/summary#showRedirect" class="btn btn-default basketListItem" role="button">Summary</a>
            </div>
        </div>

        <!-- Table -->
        <table class="table">
            <thead>
            <th colspan="2" style="text-align: center;">Book</th>
                <th>Price</th>
                <th>
                    <form method="post" action="<?= $this->app->getBaseUrl() ?>basket/basket#showRedirect">
                        <input type="hidden" name="id_book" value="all" />
                        <input type="image" value="submit" src="<?= $this->app->getBaseUrl() ?>images/basket_deny.png" alt="submit Button" style="width: 40px;" />
                    </form>
                </th>
            </thead>

            <?php
                foreach ($data['show_basket_result'] as $basketItem)
                {
                    echo '<tr id="book' . $basketItem['id_book'] . '">
                            <td style="text-align: center;"><img height="70" src="' . $this->app->getBaseUrl() . 'images/books/' . $basketItem['book_image'] . '" /></td>
                            <td><p><strong>' . $basketItem['book_title'] . '</strong></p><p>' . $basketItem['author_name'] . '</p></td>
                            <td style="vertical-align: middle;"><p>' . $basketItem['book_price'] . ' €</p></td>
                            <td style="vertical-align: middle;">
                                <form method="post" action="' . $this->app->getBaseUrl() . 'basket/basket#showRedirect">
                                    <input type="hidden" name="id_book" value="' . $basketItem['id_book'] . '" />
                                    <input type="image" value="submit" src="' . $this->app->getBaseUrl() . 'images/item_deny.png" alt="submit Button" style="width: 30px;" />
                                </form>
                            </td>
                        </tr>';                    
                }
            ?>
            <tr>
                <td style="text-align: center;"><strong>Total:</strong></td>
                <td><strong><?= $bookCount ?> books</strong></td>
                <td><strong><?= $totalPrice ?>  €</strong></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;">
                    <form method="post" action="<?= $this->app->getBaseUrl(); ?>basket/payment#showRedirect">
                        <button type="submit" class="btn btn-success">Next</button>
                    </form>
                </td>
            </tr>

        </table>
</div>
<?php
    }
?>
