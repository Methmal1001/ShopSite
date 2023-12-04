<h3 class="text-center text-success">All Users</h3>

<table class="table table-bordered mt-5">
    <thead>

    <?php
    
    $get_payments="SELECT * FROM user_table";
    $result=mysqli_query($con,$get_payments);
    $row_count=mysqli_num_rows($result);
    echo "<tr>
    <th class='bg-info'>Sl No</th>
    <th class='bg-info'>Username</th>
    <th class='bg-info'>User email</th>
    <th class='bg-info'>User address</th>
    <th class='bg-info'>User mobile</th>
    <th class='bg-info'>Delete</th>
</tr>
</thead>
<tbody>";

    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No users yet</h2>";
    }else{
        $number=0;

        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $Username=$row_data['Username'];
            $user_email=$row_data['user_email'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
            
            $number++;

            echo "<tr>
            <td class='bg-secondary text-light'>$number</td>
            <td class='bg-secondary text-light'>$Username</td>
            <td class='bg-secondary text-light'>$user_email</td>
            <td class='bg-secondary text-light'>$user_address</td>
            <td class='bg-secondary text-light'>$user_mobile</td>
            <td class='bg-secondary text-light'><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        }
    }

    ?>
    
        
    </tbody>
</table>
