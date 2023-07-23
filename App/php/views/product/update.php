<?php
$product = $products['product'][0];
?>

<article>
    <h1>Edit a Product</h1>
    <form class="create" action="" method="post" enctype="multipart/form-data">
        <div class="first-container">
            <div class="second-container">
                <label for="">Product Image</label>
            </div>
            <input id="upload-file" type="file" name="image" value="<?php echo $product['picture'] ?? '' ?>">
        </div>

        <div class="first-container">
            <div class="second-container">
                <label for="">Product Title</label>
            </div>
            <input class="create-title-input" type="text" name="title" value="<?php echo $product['title'] ?? '' ?>">
        </div>

        <div class="first-container description-container">
            <div class="second-container">
                <label for="">Product Description</label>
            </div>
            <input type="text" name="description" value="<?php echo $product['description'] ?? '' ?>">
        </div>
        <div class="first-container">
            <div class="second-container">
                <label for="">Product Price</label>
            </div>
            <input class="create-price-input" type="text" name="price" value="<?php echo $product['price'] ?? '' ?>">
        </div>
        <button type="submit" class="submit-button">Submit</button>
    </form>
</article>
<script src="./../../js/validation.js"></script>




