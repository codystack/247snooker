<?php
include_once "./auth/bank-query.php";
?>
<!-- Delete Modal Start-->
<div class="modal fade" id="userDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img src="./assets/images/png/danger.png" width="120px">
                </div>
                <h4 class="text-center">Are you sure you want to delete this bank details?</h4>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="form-delete-user">
                    <input type="hidden" name="id">
                </form>
            </div>
            <div class="modal-footer justify-content-center mt-n3 mb-4">
                <button type="submit" form="form-delete-user" name="delete_user" class="btn btn-sm btn-success">Confirm Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal End-->