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
                <input class="search-input" type="text" name="search" placeholder="Samsung S23 Ultra">
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
                <td><img src="<?php  echo $value['picture'] ?? ''?>" alt="not-set" width="40px" height="40px"></td>
                <td><?php echo $value['title'] ?? '';?></td>
                <td><?php echo $value['price'] ?? '';?></td>
                <td><?php echo $value['create_date'] ?? '';?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="edit">
                        <button class="edit-product">Edit</button>
                        <input type="hidden" name="Delete">
                        <button class="delete-product" >Delete </button>
                    </form>
                </td>
            </tr>

            <?php endforeach;?>
        </table>

    </div>


</article>