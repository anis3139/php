<div class="row">
    <div class="col-md-8 offset-md-2 error-div mt-3">
        <?php
            if (isset($_SESSION['error'])):
                                        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?php  echo  $_SESSION['error']; ?>
            <button type="button" class="btn-close" onclick="closeAlert()"></button>
        </div>
        <?php  elseif (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?php  echo  $_SESSION['success']; ?>
            <button type="button" class="btn-close" onclick="closeAlert()"></button>
        </div>
        <?php
            endif;?>
    </div>
</div>