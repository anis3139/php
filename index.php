
  <?php
    require_once('./header.php');
   
  ?>
          
        <div class="container table-responsive py-5"> 
          <a href="./add.php" class="btn btn-primary btn-lg add-btn" >Add new</a>
          <?php
            $sql= 'SELECT * FROM students';
                $result=mysqli_query($mysql, $sql) or die('no result found');
                if (mysqli_num_rows($result)>0):
                ?>
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Edit</th>
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
                <td><?php echo isset($students['district'])?$students['district']:'Not Set';?> </td>
                <td><a href="./edit.php?id=<?php echo $students['id']?>">Edit</a></td>
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

 
