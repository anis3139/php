<?php
    require_once('./header.php');
   
    if (isset($_REQUEST['delID'])) {
        $delID= $_REQUEST['delID'];
        $name= $_REQUEST['name'];
        
        $delSql="DELETE FROM users WHERE id={$delID}";
        $res= mysqli_query($mysql, $delSql);
        if ($res) {
            header("Location: ./user.php");
        }
    }

 
  ?>


<div class="container table-responsive py-5">
    <a href="./add-user.php" class="btn btn-primary btn-lg add-btn">Add User</a>
    <?php
            $sql= 'SELECT id, name, email, phone, gender, dob, role, created_at FROM users  limit 100';
       
                $result=mysqli_query($mysql, $sql) or die('no result found');
                if (mysqli_num_rows($result)>0):
                ?>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Gender</th>
                <th scope="col">Date of birth</th>
                <th scope="col">Role</th>
                <th scope="col">Created</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
              
                while ($users=mysqli_fetch_assoc($result)) :
            ?>
            <tr>
                <td scoppe='row'><?php echo $users['id'];?>
                </td>
                <td><?php echo $users['name'];?>
                </td>
                <td><?php echo $users['email'];?>
                <td><?php echo $users['phone'];?>
                <td><?php echo $users['gender']==1? "Male":"Female"; ?>
                <td><?php echo $users['dob'];?>
                </td>
                <td><?php echo  $users['role' ]?>
                <td><?php echo  $users['created_at' ]?>
                </td>
                <td>
                    <?php  if ($isAdmin): ;?>
                    <a class="text-success"
                        href="./edit-user.php?id=<?php echo $users['id']?>">Edit</a>
                    <?php  endif ;?>
                </td>

                <td>
                    <?php  if ($isAdmin): ;?>

                    <a onClick="return confirm('Delete This User?')" class="text-danger"
                        href="./user.php?delID=<?php echo $users['id']?> ">Delete</a>
                    <?php  endif ;?>
                </td>

            </tr>
            <?php
                endwhile;
             
            ?>
        </tbody>
    </table>
    <?php  else: ;?>
    <h1>No Data Found</h1>
    <?php endif ?>
</div>

<?php
  require_once('./footer.php')
?>
<!-- end  -->