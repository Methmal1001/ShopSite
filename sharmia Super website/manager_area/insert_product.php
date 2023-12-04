<?php
include('../includes/connect.php');

if(isset($_POST['insert_product'])){

    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing image temporary name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking empty condition
    if(empty($product_title) || empty($description) || empty($product_keywords) || empty($product_category) || empty($product_brands)
    || empty($product_price) || empty($product_image1) || empty($product_image2) || empty($product_image3)){
        echo "<script>alert('Please fill all required fields')</script>";
        exit();
    } else {
        // Store uploaded images within the local machine file
        move_uploaded_file($temp_image1, "../admin_area/product_images/$product_image1");
        move_uploaded_file($temp_image2, "../admin_area/product_images/$product_image2");
        move_uploaded_file($temp_image3, "../admin_area/product_images/$product_image3");

        // insert query
        $insert_products = "INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id,
        product_image1, product_image2, product_image3, product_price, date, status) VALUES ('$product_title', '$description', '$product_keywords', '$product_category', '$product_brands',
        '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

        $result_query = mysqli_query($con, $insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted')</script>";
        } else {
            echo "Error: " . mysqli_error($con); // Display MySQL error message
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product-Admin Dashboard</title>
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" 
                autocomplete="off" required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" 
                autocomplete="off" required="required">
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" 
                autocomplete="off" required="required">
            </div>


            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                        $select_query="Select * from categories";
                        $result_query=mysqli_query($con,$select_query);

                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];

                            echo "<option value='$category_id'>$category_title</option>";
                        }

                    ?>
                    <!-- <option value="">Fruits</option>
                    <option value="">Vegitables</option>
                    <option value="">Books</option> -->
                </select>
            </div>

            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select Brands</option>
                    <?php
                    $select_query = "SELECT * FROM brands";
                    $result_query = mysqli_query($con, $select_query);

                    while($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];

                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>

                    <!-- <option value="">Brands1</option>
                    <option value="">Brands2</option>
                    <option value="">Brands3</option> -->
                </select>
            </div>

            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" 
                autocomplete="off" required="required">
            </div>

            <!-- image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 1</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"
                autocomplete="off" required="required">
            </div>

            <!-- image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 1</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" 
                autocomplete="off" required="required">
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" 
                autocomplete="off" required="required">
            </div>

            <!-- submit button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>

        <div class="form-outline mb-4 w-50 m-auto">
            <a href="index.php">
                <button type="button" class="btn btn-info mb-3 px-3">Back</button>
            </a>
        </div>
    </div>
</body>
</html>