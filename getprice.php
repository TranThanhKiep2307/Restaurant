<?php
    include("../Restaurant/classes/product.php");
?>
<?php
    $product = new product();
    if (isset($_POST['TA_MA'])) {
        $selected_TA_MA = $_POST['TA_MA'];
        $getgia = $product->getproductbyGIA($selected_TA_MA);
        echo $getgia;
}
?>