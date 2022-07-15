<?php
    require_once('./header.php');
   
    if (isset($_REQUEST['delID'])) {
        if ($_REQUEST['delID']==$logedInUser['id'] || $isSuperAdmin) {
            $delID= $_REQUEST['delID'];
            $name= $_REQUEST['name'];
            
            $delSql="DELETE FROM users WHERE id={$delID}";
            $res= mysqli_query($mysql, $delSql);
            if ($res) {
                header("Location: ./user.php");
            }
        } else {
            alertMessage('error', "Unautherized");
        }
    }

 
  ?>


<div class="container table-responsive py-5">
    <?php  include('./errorMessage.php') ;?>
    <div class="text-end my-2">
        <a href="./add-user.php" class="btn btn-primary btn-lg add-btn">Add User</a>
    </div>
    <?php
        if (!isset($_GET['page'])) {
            $page_number = 1;
        } else {
            $page_number = $_GET['page'];
        }

        $limit = 2;

        $initial_page = ($page_number-1) * $limit;

        $sql= "SELECT * FROM users";
        $result=mysqli_query($mysql, $sql) or die('no result found');
        $total_rows=mysqli_num_rows($result);
        $total_pages = ceil($total_rows / $limit);

        if ($total_rows>0):
            $getQuery = "SELECT *FROM users ORDER BY id DESC LIMIT " . $initial_page . ',' . $limit;
            $resultUsers = mysqli_query($mysql, $getQuery);
     
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
                <?php  if ($isSuperAdmin): ;?>
                <th scope="col">Delete</th>
                <?php  endif  ;?>
            </tr>
        </thead>
        <tbody>
            <?php
              
                while ($users=mysqli_fetch_assoc($resultUsers)) :
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
                <?php  if ($isSuperAdmin || $users['id']== $logedInUser['id']): ;?>
                <td>
                    <a class="text-success"
                        href="./edit-user.php?id=<?php echo $users['id']?>">Edit</a>
                </td>
                <?php  endif ;?>

                <?php  if ($isSuperAdmin): ;?>
                <td>

                    <a onClick="return confirm('Delete This User?')" class="text-danger"
                        href="./user.php?delID=<?php echo $users['id']?> ">Delete</a>
                </td>
                <?php  endif ;?>

            </tr>
            <?php
                endwhile;
             
            ?>
        </tbody>
    </table>

    <!-- pagination  -->
    <div class="items ">
        <?php

            $pageURL = "";

            if ($page_number>=2) {
                echo "<a  href='user.php?page=".($page_number-1)."'>  Prev </a>";
            }

            for ($i=1; $i<=$total_pages; $i++) {
                if ($i == $page_number) {
                    $pageURL .= "<a   class = 'active' href='user.php?page="

                                                    .$i."'>".$i." </a>";
                } else {
                    $pageURL .= "<a  href='user.php?page=".$i."'>   

                                                    ".$i." </a>";
                }
            };

            echo $pageURL;

            if ($page_number<$total_pages) {
                echo "<a  href='user.php?page=".($page_number+1)."'>  Next </a>";
            }

            ?>

    </div>

    <div class="inline">

        <input id="page" type="number" min="1"
            max="<?php echo $total_pages?>"
            placeholder="<?php echo $page_number."/".$total_pages; ?>"
            required>

        <button onClick="go2Page('user');">Go</button>

    </div>
    <?php  else: ;?>
    <h1>No Data Found</h1>
    <?php endif ?>
</div>

<?php
  require_once('./footer.php')
?>
<!-- end  -->