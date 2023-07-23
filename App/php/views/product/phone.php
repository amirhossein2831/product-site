<?php
$product = $products['product'][0];
?>
<article class="center-article">
    <div class="product-image">
        <img src="./../<?php echo $product['picture']; ?>" alt="">
    </div>


    <div style="width: 25%;height:0"><label for="">Title</label></div>
    <div class="product-title">
        <p><?php echo $product['title']; ?></p>
    </div>

    <div style="width: 25%;height: 0"><label for="">Price</label></div>
    <div class="product-price">
        <p><?php echo $product['price']; ?></p>
    </div>

    <?php if($product['description']):?>
        <div style="width: 25%;height: 0"><label for="">Description</label></div>
        <div class="product-description">
            <div><p><?php echo $product['description']; ?></p></div>
        </div>
    <?php endif; ?>

</article>