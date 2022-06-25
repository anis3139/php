
  <?php
    require_once('./header.php');


    if (isset($_REQUEST['delID'])) {
        $delID= $_REQUEST['delID'];
        $name= $_REQUEST['name'];
        
        $delSql="DELETE FROM students WHERE id={$delID} AND name='{$name}'";
        $res= mysqli_query($mysql, $delSql);
        if ($res) {
            header("Location: ./users.php");
        }
    }
   
  ?>

      <?php
          // $sql2= 'SELECT sum(age) FROM users ORDER BY username ASC ';
          // $result2=mysqli_query($mysql, $sql2) or die('no result found');
          // $totlaUsers=mysqli_fetch_assoc($result2);

          $sql2= 'SELECT username, email, phone, age, gender
                  FROM users
                  LEFT JOIN address
                  ON users.id = address.user_id';
          $result2=mysqli_query($mysql, $sql2) or die('no result found');
          $totlaUsers=mysqli_fetch_assoc($result2);
          // echo ceil($totlaUsers["sum(age)"]);
          // echo "<pre>";
          // print_r($totlaUsers);
          // echo "</pre>";
 
      ?>

 
          
        <div class="container table-responsive py-5"> 
          <a href="./add.php" class="btn btn-primary btn-lg add-btn" >Add new</a>
          <?php
            $sql= "SELECT users.id, users.username, users.email, users.phone, users.age, users.gender, ad.house, st.class
            FROM users
            LEFT JOIN address AS ad  ON users.id = ad.user_id
            LEFT JOIN students AS st ON users.id = st.user_id";

            $result=mysqli_query($mysql, $sql) or die('no result found');
            var_dump($result);
                if (mysqli_num_rows($result)>0):
                ?>
                 
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Age</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
                <th scope="col">House</th>
                <th scope="col">class</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
                while ($users=mysqli_fetch_assoc($result)) :
            ?>
              <tr>
                <td scoppe='row'><?php echo $users['id'];?></td>
                <td><?php echo $users['username'];?></td>
                <td><?php echo $users['email'];?></td>
                <td><?php echo $users['age'];?></td>
                <td><?php echo isset($users['phone'])?$users['phone']:'Not Set';?> </td>
                
                <td><?php
                  if (isset($users['gender'])) {
                      $gender= $users['gender']==1?'Femele':'male';
                  }
                 echo  $gender ;
                 ?> </td>

                <td><?php echo $users['house'];?></td>
                <td><?php echo $users['class'];?></td>
                <td><a class="text-success" href="./edit.php?id=<?php echo $users['id']?>">Edit</a></td>

                <td> <a onClick="return confirm('Delete This account?')" class="text-danger" href="./index.php?delID=<?php echo $users['id']?>&name=<?php echo $users['name'];?>">Delete</a></td>

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

 
