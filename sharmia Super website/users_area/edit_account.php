<?php

if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM user_table WHERE Username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_username = $row_fetch['Username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
}

if(isset($_POST['user_update'])){
    $update_id = $user_id;
    $username = isset($_POST['user_username']) ? $_POST['user_username'] : '';
    $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $user_address = isset($_POST['user_address']) ? $_POST['user_address'] : '';
    $user_mobile = isset($_POST['user_mobile']) ? $_POST['user_mobile'] : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_username" value="<?php echo isset($user_username) ? $user_username : ''; ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?php echo isset($user_email) ? $user_email : ''; ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo isset($user_address) ? $user_address : ''; ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?php echo isset($user_mobile) ? $user_mobile : ''; ?>">
        </div>

        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">
    </form>
</body>
</html>
