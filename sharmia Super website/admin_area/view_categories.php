<h3 class="text-center text-success">All Categories</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th class="bg-info">Slno</th>
            <th class="bg-info">Category title</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
// Initialize the number variable
$number = 0;

// Check for a valid database connection
if ($con) {
    $select_cat = "SELECT * FROM categories";
    $result = mysqli_query($con, $select_cat);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
?>
            <tr class="text-center">
                <td class="bg-secondary text-light"><?php echo $number; ?></td>
                <td class="bg-secondary text-light"><?php echo $category_title; ?></td>
                <td class="bg-secondary text-light"><a href='index.php?edit_category=<?php echo $category_id; ?>'><i class='fa-solid fa-pen-to-square bg-info'></i></a></td>
                <td class="bg-secondary text-light"><a href='index.php?delete_category=<?php echo $category_id; ?>'><i class='fa-solid fa-trash bg-danger'></i></a></td>
            </tr>
<?php
        }
    } else {
        // Handle the database query error
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection when done
    mysqli_close($con);
} else {
    // Handle the database connection error
    echo "Failed to connect to the database.";
}
?>

    </tbody>
</table>