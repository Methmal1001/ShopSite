<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
    if(isset($_POST['brand_title'])) { // Check if brand_title is set
        $brand_title = $_POST['brand_title'];

        // select data from database
        $select_query = "SELECT * FROM `brands` WHERE brand_title='$brand_title'";
        $result_select = mysqli_query($con, $select_query);

        if ($result_select === false) {
            echo "Error: " . mysqli_error($con); // Display MySQL error message
        } else {
            $number = mysqli_num_rows($result_select);
            if($number > 0){
                echo "<script>alert('This brand already exists')</script>";
            } else {
                $insert_query = "INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
                $result = mysqli_query($con, $insert_query);
                if($result){
                    echo "<script>alert('Brand has been inserted successfully')</script>";
                } else {
                    echo "Error: Failed to insert brand - " . mysqli_error($con); // Display MySQL error message
                }
            }
        }
    }
}
?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert brands" 
        aria-label="Brand" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-90 mb-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" 
        name="insert_brand" value="Insert Brands">
    </div>
</form>
