<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
    if(isset($_POST['cat_title'])) { // Check if cat_title is set
        $category_title = $_POST['cat_title'];

        // select data from database
        $select_query = "SELECT * FROM `categories` WHERE category_title='$category_title'";
        $result_select = mysqli_query($con, $select_query);

        if ($result_select === false) {
            echo "Error: " . mysqli_error($con); // Display MySQL error message
        } else {
            $number = mysqli_num_rows($result_select);
            if($number > 0){
                echo "<script>alert('This category already exists')</script>";
            } else {
                $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
                $result = mysqli_query($con, $insert_query);
                if($result){
                    echo "<script>alert('Category has been inserted successfully')</script>";
                } else {
                    echo "Error: " . mysqli_error($con); // Display MySQL error message
                }
            }
        }
    }
}
?>

<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert category" 
        aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-90 mb-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" 
        name="insert_cat" value="Insert Categories">
    </div>
</form>
