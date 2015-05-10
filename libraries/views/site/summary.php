<?php
    if(isset($data['error']))
    {
        echo $data['error'];
    }
    
    $bookCount = $data['bookCount'];
    $totalPrice = $data['totalPrice'];
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $paymentType = $data['paymentType'];
?>
    
<div class="panel panel-default col-lg-8 col-lg-offset-2" style="padding-left: 0; padding-right: 0;">
        <!-- Default panel contents -->
        <div class="panel-heading">Basket</div>
        <div class="panel-body">
            <div id="categoriesList" class="btn-group col-lg-6 col-lg-offset-3" role="group" aria-label="...">
                <a href="<?= $this->app->getBaseUrl() ?>basket/basket#showRedirect" class="btn btn-default basketListItem" role="button">Basket</a>
                <a href="<?= $this->app->getBaseUrl() ?>basket/Payment#showRedirect" class="btn btn-default basketListItem" role="button">Payment</a>
                <a href="<?= $this->app->getBaseUrl() ?>basket/summary#showRedirect" class="btn btn-info basketListItem" role="button">Summary</a>
            </div>
        </div>

        <!-- Table -->
        <table class="table">
            <thead>
                <th></th>
            </thead>

            <form method="post" action="<?php $this->app->getBaseUrl() ?>pay#showRedirect" id="summaryForm">
                <div class="input-group col-lg-4 col-lg-offset-4">
                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Name</span>
                    <input type="text" class="form-control text-center" name="name" aria-describedby="basic-addon1" value="<?= $name ?>" readonly="true">
                </div>    
                <div class="input-group col-lg-4 col-lg-offset-4">
                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1">E-mail</span>
                    <input type="email" class="form-control text-center" name="email" aria-describedby="basic-addon1" value="<?= $email ?>" readonly="true">
                </div>
                <div class="input-group col-lg-4 col-lg-offset-4">
                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Phone</span>
                    <input type="text" class="form-control text-center" name="phone" aria-describedby="basic-addon1" value="<?= $phone ?>" readonly="true">
                </div>
                <div class="input-group col-lg-4 col-lg-offset-4">
                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Payment type</span>
                    <input type="text" class="form-control text-center" name="paymentType" aria-describedby="basic-addon1"  value="<?= $paymentType ?>" readonly="true">
                </div>
                <div class="input-group col-lg-4 col-lg-offset-4">
                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Books count</span>
                    <input type="text" class="form-control text-center" name="booksCount" aria-describedby="basic-addon1" value="<?= $bookCount ?>" readonly="true">
                </div>
                <div class="input-group col-lg-4 col-lg-offset-4">
                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Total price (€)</span>
                    <input type="text" class="form-control text-center" name="totalPrice" aria-describedby="basic-addon1" value="<?= $totalPrice ?>" readonly="true">
                </div>
            </form>
            <tr>
                <td colspan="4" style="text-align: right;">
                    <button type="submit" class="btn btn-success" form="summaryForm" >Pay</button>
                </td>
            </tr>
            
        </table>
</div>