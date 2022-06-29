
  <?php
    require_once('./header.php');
    $isLogin=$_SESSION['login'];
    if ($isLogin!='success') {
        header('location:login.php');
    }

    if (isset($_REQUEST['logout'])) {
        $delID= $_REQUEST['logout'];
        session_destroy(); 
        header("Location: ./login.php"); 
    }
    if (isset($_REQUEST['delID'])) {
        $delID= $_REQUEST['delID'];
        $name= $_REQUEST['name'];
        
        $delSql="DELETE FROM students WHERE id={$delID} AND name='{$name}'";
        $res= mysqli_query($mysql, $delSql);
        if ($res) {
            header("Location: ./index.php");
        }
    }

 
  ?>
 
          
        <div class="container table-responsive py-5"> 

          <form action="" class="text-end mb-5">
            <input type="submit" name="logout" value="Logout" class="btn btn-danger">
          </form>



          <a href="./add.php" class="btn btn-primary btn-lg add-btn" >Add new</a>
          <?php
            $sql= 'SELECT id, name, class, district as d FROM students WHERE name IS NOT NULL ORDER BY name ASC limit 100';
                $result=mysqli_query($mysql, $sql) or die('no result found');
                if (mysqli_num_rows($result)>0):
                ?>
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">District</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
                while ($students=mysqli_fetch_assoc($result)) :
            ?>
              <tr>
                <td scoppe='row'><?php echo $students['id'];?></td>
                <td><?php echo $students['name'];?></td>
                <td><?php echo $students['class'];?></td>
                <td><?php echo isset($students['d'])?$students['d']:'Not Set';?> </td>
                <td><a class="text-success" href="./edit.php?id=<?php echo $students['id']?>">Edit</a></td>

                <td> <a onClick="return confirm('Delete This account?')" class="text-danger" href="./index.php?delID=<?php echo $students['id']?>&name=<?php echo $students['name'];?>">Delete</a></td>

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

 
