<?php
if (!empty($data['error'])) {
    echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";       
}
if (!empty($data['success'])) {
    echo "<div class='alert alert-success' role='alert'>" . $data['success'] . "</div>";
}
?>

<!--echo '<div class="product-detail"        
    <p class="p-name">' . $product['menop'] . '</p>
    <p class="p-description">' . $product['description'] . '</p>
    <p class="p-manufacturer">' . $product['manufacturer'] . '</p>
    <p class="p-price">' . $product['price'] . '</p>
    </div>';
    }-->

