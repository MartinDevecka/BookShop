<?php
    if(isset($data['error']))
    {
        echo $data['error'];
    }
    
    $paymentType = $data['paymentType'];
?>

<div class="panel panel-default col-lg-8 col-lg-offset-2" style="padding-left: 0; padding-right: 0;">
        <!-- Default panel contents -->
        <div class="panel-heading">Basket</div>
        <?php
            if(isset($data['error']))
            {
                echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
            }
        ?>
        <div class="panel-body">
            <div id="categoriesList" class="btn-group col-lg-6 col-lg-offset-3" role="group" aria-label="...">
                <a href="<?= $this->app->getBaseUrl() ?>basket/basket#showRedirect" class="btn btn-default basketListItem" role="button">Basket</a>
                <a href="<?= $this->app->getBaseUrl() ?>basket/Payment#showRedirect" class="btn btn-info basketListItem" role="button">Payment</a>
                <a href="<?= $this->app->getBaseUrl() ?>basket/summary#showRedirect" class="btn btn-default basketListItem" role="button">Summary</a>
            </div>
        </div>

        <!-- Table -->
        <table class="table">
            <thead>
                <th colspan="3" style="text-align: center;">Payment Type</th>
            </thead>
            
            <tr class="text-center">
                <td>
                    <form method="post" action="<?php $this->app->getBaseUrl() ?>summary#showRedirect" id="paymentForm">
                        <select name="paymentType" class="btn btn-default">
                            <option <?php if($paymentType == ''){echo("selected");}?> class="btn btn-default" value="" >---SELECT---</option>
                            <option <?php if($paymentType == 'Bank Transfers'){echo("selected");}?> class="btn btn-default" value="Bank Transfers" >Bank Transfers</option>
                            <option <?php if($paymentType == 'Cash on Delivery'){echo("selected");}?> class="btn btn-default" value="Cash on Delivery" >Cash on Delivery</option>
                            <option <?php if($paymentType == 'Checks'){echo("selected");}?> class="btn btn-default" value="Checks" >Checks</option>
                            <option <?php if($paymentType == 'Credit Card'){echo("selected");}?> class="btn btn-default" value="Credit Card" >Credit Card</option>
                        </select>
                    </form>
                </td>
            </tr>
            
            <tr>
                <td colspan="4" style="text-align: right;">
                    <button type="submit" class="btn btn-success" form="paymentForm" >Check out</button>
                </td>
            </tr>

        </table>
</div>
