    <!-- Admin Delete Modal Start-->
    <div class="modal fade" id="adminDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mt-0">
                        <img src="./assets/img/caution.svg" width="200px">
                    </div>
                    <h4 class="text-center">Are you sure you want to delete this user?</h4>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="form-delete-admin">
                        <input type="hidden" name="id">
                    </form>
                </div>
                <div class="modal-footer border-0 justify-content-center mt-n3 mb-4">
                    <button type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="form-delete-admin" name="delete_admin_btn" class="btn btn-lg text-white btn-success">Confirm Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Delete Modal End-->



    <!-- Support Delete Modal Start-->
    <div class="modal fade" id="supportDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mt-0">
                        <img src="./assets/img/caution.svg" width="200px">
                    </div>
                    <h4 class="text-center">Are you sure you want to delete this enquiry?</h4>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="form-delete-support">
                        <input type="hidden" name="id">
                    </form>
                </div>
                <div class="modal-footer border-0 justify-content-center mt-n3 mb-4">
                    <button type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="form-delete-support" name="delete_support_btn" class="btn btn-lg text-white btn-success">Confirm Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Support Delete Modal End-->


    <!-- Quote Delete Modal Start-->
    <div class="modal fade" id="quoteDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mt-0">
                        <img src="./assets/img/caution.svg" width="200px">
                    </div>
                    <h4 class="text-center">Are you sure you want to delete this quote?</h4>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="form-delete-quote">
                        <input type="hidden" name="id">
                    </form>
                </div>
                <div class="modal-footer border-0 justify-content-center mt-n3 mb-4">
                    <button type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="form-delete-quote" name="delete_quote_btn" class="btn btn-lg text-white btn-success">Confirm Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote Delete Modal End-->


    <!-- Contestant Delete Modal Start-->
    <div class="modal fade" id="contestantDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mt-0">
                        <img src="./assets/img/caution.svg" width="200px">
                    </div>
                    <h4 class="text-center">Are you sure you want to delete this contestant?</h4>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="form-delete-contestant">
                        <input type="hidden" name="id">
                    </form>
                </div>
                <div class="modal-footer border-0 justify-content-center mt-n3 mb-4">
                    <button type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="form-delete-contestant" name="delete_contestant_btn" class="btn btn-lg text-white btn-success">Confirm Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Contestant Delete Modal End-->