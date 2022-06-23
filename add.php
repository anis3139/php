<?php require_once('./header.php') ; ?>



<div class="row">
    <div class="col-md-10 offset-md-1 mt-5">
        <form action="./addData.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input required type="text" class="form-control" id="name" name="name"> 
            </div>
            <div class="mb-3">
            <label for="class" class="form-label">Class</label>
                <input required type="text" class="form-control" id="class" name="class">
            </div>
            <div class="mb-3">
            <label for="district" class="form-label">District</label>
                <input required type="text" class="form-control" id="district" name="district">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

    
<?php require_once('./footer.php');?>
