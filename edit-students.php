<?php
require_once('./header.php');
?>
    
    
<?php
        $id=$_GET['id'];
        $sql= "SELECT * FROM students WHERE `id` = '$id'";
        $result=mysqli_query($mysql, $sql) or die('no result found');
        if (mysqli_num_rows($result)==0):
                header("Location: index.php");
        else:
            $student=mysqli_fetch_assoc($result); 
?>
    <div class=" text-center mt-2">
        <h1>Edit Students</h1>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-5">
            <form action="./UpdateStudentData.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $student['id'];?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $student['name'];?>"> 
                </div>
                <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                    <input type="text" class="form-control" id="class" name="class" value="<?php echo $student['class'];?>">
                </div>
                <div class="mb-3">
                <label for="district" class="form-label">District</label>
                    <input type="text" class="form-control" id="district" name="district" value="<?php echo $student['district'];?>">
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>



<?php endif; ?>

<?php
require_once('./footer.php');
?>