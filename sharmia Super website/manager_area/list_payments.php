<h3 class="text-center text-success">Confirmed Payments</h3>

<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th class='bg-info'>Sl No</th>
            <th class='bg-info'>Invoice No</th>
            <th class='bg-info'>User Name</th>
            <th class='bg-info'>User Address</th>
            <th class='bg-info'>User Mobile</th>
            <th class='bg-info'>Amount</th>
            <th class='bg-info'>Payment mode</th>
            <th class='bg-info'>Order Date</th>
            <th class='bg-info'>Delete</th>
        </tr>
    </thead>
    <tbody>

<?php
$get_payments = "SELECT user_payments.*, user_table.Username, user_table.user_address, user_table.user_mobile
                 FROM user_payments
                 JOIN user_table ON user_payments.user_id = user_table.user_id";

$result = mysqli_query($con, $get_payments);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

$row_count = mysqli_num_rows($result);

if ($row_count == 0) {
    echo "<h2 class='text-danger text-center mt-5'>No payments received yet</h2>";
} else {
    $number = 0;

    while ($row_data = mysqli_fetch_assoc($result)) {
        $order_id = $row_data['order_id'];
        $payment_id = $row_data['payment_id'];
        $amount = $row_data['amount'];
        $invoice_number = $row_data['invoice_number'];
        $payment_mode = $row_data['payment_mode'];
        $date = $row_data['date'];
        $username = $row_data['Username'];
        $user_address = $row_data['user_address'];
        $user_mobile = $row_data['user_mobile'];
        $number++;

        echo "<tr>
                <td class='bg-secondary text-light'>$number</td>
                <td class='bg-secondary text-light'>$invoice_number</td>
                <td class='bg-secondary text-light'>$username</td>
                <td class='bg-secondary text-light'>$user_address</td>
                <td class='bg-secondary text-light'>$user_mobile</td>
                <td class='bg-secondary text-light'>$amount</td>
                <td class='bg-secondary text-light'>$payment_mode</td>
                <td class='bg-secondary text-light'>$date</td>
                <td class='bg-secondary text-light'><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
              </tr>";
    }
}

?>

    </tbody>
</table>
