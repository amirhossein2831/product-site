<?php
$product = $products['product'] ?? '';
?>

<article>
    <h1>Products List</h1>
    <div class="form-container">
        <div>
            <a href="/product/create" class="create-link">Create Product</a>
            <br>
            <br>
            <form class="search-form" action="" method="get">
                <input id="search-input" class="search-input" type="text" name="search" placeholder="Samsung S23 Ultra" value="">
                <button class="search-button">Search</button>
            </form>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <table class="product_table">
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 10%;">Image</th>
                <th style="width: 20%;">Title</th>
                <th style="width: 15%;">Price</th>
                <th style="width: 30%;">Create Date</th>
                <th style="width: 20%;">Action</th>
            </tr>
            <?php $index = 1;?>
            <?php foreach ($product as $key => $value):?>

            <tr>
                <td class="Id"><?php echo $index++;?></td>

                <?php if($value['picture']):?>
                    <td>
                        <form class="form_image" id="myForm" action="/product/phone" method="post">
                            <input type="hidden" name="id" value="<?php echo $value['id'] ?>"/>
                            <img class="image_but" src="<?php  echo $value['picture']?>" alt="not-set" width="40px" height="40px">
                        </form>
                    </td>
                <?php else: ?> <td> </td>
                <?php endif; ?>

                <td><p class="p_but"><?php echo $value['title'] ?? '';?></p></td>
                <td><?php echo $value['price'] ?? '';?></td>
                <td><?php echo $value['create_date'] ?? '';?></td>
                <td>
                    <a class="edit-link" href="/product/update?id=<?php echo $value['id']?>">Edit</a>

                    <form style="display: inline-block" action="/product/delete" method="post">
                           <input type="hidden" name="delete" value="<?php echo $value['id']; ?>">
                           <button  class="delete-product" >Delete </button>
                   </form>
                </td>
            </tr>

            <?php endforeach;?>
        </table>
    </div>
</article>
<script src="./js/openLink.js"></script>

