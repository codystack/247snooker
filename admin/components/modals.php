    <!-- Create new admin modal start-->
    <div class="modal fade" id="createNewAdminModal" tabindex="-1" aria-labelledby="createNewAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <div class="modal-header pb-0 border-0">
                    <h1 class="modal-title h4" id="createNewAdminModalLabel">Create New Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <hr class="mb-0">
                <div class="row g-5 mt-3 mb-2">
                    <div class="col-sm-6 mx-auto">
                        <div class="alert alert-danger" role="alert">Default Password: <b>123456</b></div>
                    </div>
                </div>

                <div class="modal-body undefined">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="row g-5 mb-5">
                            <div class="col-sm-6">
                                <label class="form-label">First name</label> 
                                <input type="text" name="firstName" required class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Last name</label> 
                                <input type="text" name="lastName" required class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12 mb-5">
                            <label class="form-label" for="email">Email address</label> 
                            <input type="email" name="email" required class="form-control" id="email">
                        </div>

                        <div class="col-sm-12 mb-5">
                            <label class="form-label">Designation</label> 
                            <select class="form-select" name="designation" required aria-label="Designation">
                                <option selected disabled>Select Designation</option>
                                <option>Admin</option>
                                <option>Super-Admin</option>
                            </select>
                        </div>

                        <div class="mb-3 mt-2">
                            <button type="submit" name="new_admin_btn" class="btn btn-dark w-100">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Create new admin modal end-->


    <!-- Create new contestant modal start-->
    <div class="modal fade" id="createNewContestantModal" tabindex="-1" aria-labelledby="createNewContestantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <div class="modal-header pb-0 border-0">
                    <h1 class="modal-title h4" id="createNewContestantModalLabel">Add New Contestant</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <hr class="mb-0">

                <div class="modal-body undefined">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                        <div class="row g-5 mb-5">
                            <div class="col-sm-12">
                                <label class="form-label">Full Name</label> 
                                <input type="text" name="fullName" required class="form-control" placeholder="John Doe">
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Odd</label> 
                                <input type="text" name="odd" required class="form-control" placeholder="5.71">
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Upload Image</label> 
                                <input type="file" name="picture" required class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <button type="submit" name="new_contestant_btn" class="btn btn-dark w-100">Add new Contestant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Create new contestant modal end-->