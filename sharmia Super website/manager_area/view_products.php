<h3 class="text-center text-success">All Details</h3>

    <table class="table table-bordered mt-5">
        <thead class="bg-info" style="background-color: blue;">
            <tr>
                <th class="bg-info">Product ID</th>
                <th class="bg-info">Product Title</th>
                <th class="bg-info">Product Image</th>
                <th class="bg-info">Product Price</th>
                <th class="bg-info">Status</th>
                <th class="bg-info">Edit</th>
                <th class="bg-info">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light" >
        <?php
    $get_products = "SELECT * FROM `products`";
    $result = mysqli_query($con, $get_products);
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $status = $row['status'];
    ?>
        <tr class='text-center'>
                <td class="bg-secondary text-light"><?php echo $product_id?></td>
                <td class="bg-secondary text-light"><?php echo $product_title?></td>
                <td class="bg-secondary text-light"><img src='../admin_area/product_images/<?php echo $product_image1 ?>' class='product_img'></td>   
                <td class="bg-secondary text-light"><?php echo $product_price ?></td>
                <td class="bg-secondary text-light"><?php echo $status ?></td>

                <td class="bg-secondary text-light"><a href='index.php?edit_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square bg-info'></i></a></td>
                <td class="bg-secondary text-light"><a href='index.php?delete_product=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-trash bg-danger'></i></a></td>
              </tr>
        <?php

    }
?>

            
        </tbody>
    </table>
