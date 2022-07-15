<?php
require_once('./header.php');
if ($_GET['id']!== $logedInUser['id']) {
    alertMessage('error', "Unautherized");
    header("Location: user.php");
    exit;
}
?>


<?php
        $id=$_GET['id'];
        $sql= "SELECT * FROM users WHERE `id` = '$id'";
        $result=mysqli_query($mysql, $sql) or die('no result found');
        if (mysqli_num_rows($result)==0):
                header("Location: user.php");
        else:
            $user=mysqli_fetch_assoc($result);
?>

<div class="d-flex gap-3 justify-content-end m-5">

    <div class=" flex-grow-1 text-center">
        <h2>Edit User (<?php echo $user['name'];?>)</h2>
    </div>
    <div>
        <a href="./user.php" class="btn btn-primary btn-lg">User List</a>

    </div>

</div>
<div class="row">
    <div class="col-md-10 offset-md-1">
        <form action="./UpdateUserData.php" method="POST">
            <input type="hidden" name="id"
                value="<?php echo $user['id'];?>">
            <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="<?php echo $user['name'];?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input readonly type="text" class="form-control" id="email"
                    value="<?php echo $user['email'];?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="<?php echo $user['phone'];?>">
            </div>


            <div class="mb-2">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" required id="gender" class="form-control">
                    <option value="1" <?php echo  $user['gender']==1?'selected':''  ;?>
                        >Male</option>
                    <option value="0" <?php echo  $user['gender']==0?'selected':''  ;?>
                        >Female</option>
                </select>
            </div>

            <div class="mb-2">
                <label for="dob" class="form-label">Date of Birth</label>
                <input required type="date"
                    value="<?php echo date('Y-m-j', strtotime($user['dob']));?>"
                    class="form-control" id="dob" name="dob">
            </div>

            <div class="mb-2">
                <label for="role" class="form-label">Role</label>
                <select name="role" required id="role" class="form-control">
                    <option value="user" <?php echo  $user['role']=='user'?'selected':''  ;?>
                        >user</option>
                    <option value="admin" <?php echo  $user['role']=='admin'?'selected':''  ;?>
                        >admin</option>
                    <option value="editor" <?php echo  $user['role']=='editor'?'selected':''  ;?>
                        >editor</option>
                    <option value="super-admin" <?php echo  $user['role']=='super-admin'?'selected':''  ;?>
                        >Super Admin</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>



<?php endif; ?>

<?php
require_once('./footer.php');
