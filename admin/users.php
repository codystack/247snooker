<?php
    $page = "Users";
    include "./components/header.php";
    include "./components/modals.php";
    require_once "./auth/queries.php";
    require_once "./auth/update.php";
    require_once "./auth/delete.php";
?>
    <div class="d-flex flex-column flex-lg-row h-lg-100 gap-1">
        <?php include "./components/side-nav.php"; ?>
        <div class="flex-lg-fill overflow-x-auto ps-lg-1 vstack vh-lg-100 position-relative">
            <?php include "./components/topnav.php"; ?>
            <div class="flex-fill overflow-y-lg-auto scrollbar bg-body rounded-top-4 rounded-top-start-lg-4 rounded-top-end-lg-0 border-top border-lg shadow-2">
                
                <main class="container-fluid px-3 py-5 p-lg-6 p-xxl-8">
                    <div class="mb-6 mb-xl-10">
                        <div class="row g-3 align-items-center">
                            <div class="col">
                                <h3 class="ls-tight">Users</h3>
                            </div>
                            <!-- <div class="col">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-sm btn-dark d-sm-inline-flex" data-bs-target="#createNewAdminModal" data-bs-toggle="modal"><span class="pe-2"><i class="bi bi-plus-circle"></i> </span><span>Add New Admin</span></button>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="row g-3 g-xxl-6">
                        <div class="col-xxl-12">
                            <div class="vstack gap-3 gap-md-6">
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="table-responsive mb-10 mt-5">
                                            <table id="admins" class="table table-hover table-striped table-sm table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <div class="d-flex align-items-center gap-2 ps-1">
                                                                <span>Full Name</span>
                                                            </div>
                                                        </th>
                                                        <th scope="col">Phone</th>
                                                        <th scope="col">Wallet</th>
                                                        <th scope="col">Winings</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col" class="d-none text-end d-xl-table-cell">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $admin_id = 1;
                                                    $select_query = "SELECT * FROM users ORDER BY dateCreated ASC";
                                                    $result = mysqli_query($conn, $select_query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        // output data of each row
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $id = $row['id'];
                                                            $firstName = $row['firstName'];
                                                            $lastName = $row['lastName'];
                                                            $phone = $row['phone'];
                                                            $wallet = $row['wallet'];
                                                            $bonus = $row['bonus'];
                                                            $status = $row['status'];
                                                            switch ($status) {
                                                                case "Inactive";
                                                                    $class  = 'bg-danger';
                                                                    $text = 'text-danger';
                                                                    $meaning = 'Blocked';
                                                                    break;
                                                                case "Active";
                                                                    $class  = 'bg-success';
                                                                    $text = 'text-success';
                                                                    $meaning = 'Active';
                                                                    break;
                                                                default:
                                                                    $class  = '';
                                                            }
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center gap-3 ps-1">
                                                                        <div class="icon icon-shape w-rem-10 h-rem-10 rounded-circle text-sm bg-dark bg-opacity-10 text-dark"><i class="bi bi-person-fill"></i></div>
                                                                        <div><span class="d-block text-heading fw-bold"><?php echo $firstName; ?> <?php echo $lastName; ?></span></div>
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $phone; ?></td>
                                                                <td>₦<?php echo number_format($wallet, 2, '.', ','); ?></td>
                                                                <td>₦<?php echo number_format($bonus, 2, '.', ','); ?></td>
                                                                <td><span class="badge <? echo $class; ?> bg-opacity-25 text-xs <? echo $text; ?>"><?php echo $meaning; ?></span></td>
                                                                <td class="text-end">
                                                                    <div class="col-md-5" style="display: <?php if ($status == 'Active'){ echo 'unset';}else{ echo 'none';}?>">
                                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                                                            <div class="row align-items-center" style="display: none;">
                                                                                <div class="col-md-8 col-xl-5">
                                                                                    <div class="">
                                                                                        <input type="number" value="<?php echo $id; ?>" name="id" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8 col-xl-5">
                                                                                    <div class="">
                                                                                        <input type="text" value="Inactive" name="status" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <a href="view-user?id=<?php echo $id; ?>" class='btn btn-dark btn-sm'>View</a>
                                                                            <button type="submit" name="update_user_status_btn" class="btn btn-danger btn-sm">Block</button>
                                                                        </form>             
                                                                    </div>
                                                                    <div class="col-md-5" style="display: <?php if ($status == 'Inactive'){ echo 'unset';}else{ echo 'none';}?>">
                                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                                                            <div class="row align-items-center" style="display: none;">
                                                                                <div class="col-md-8 col-xl-5">
                                                                                    <div class="">
                                                                                        <input type="number" value="<?php echo $id; ?>" name="id" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8 col-xl-5">
                                                                                    <div class="">
                                                                                        <input type="text" value="Active" name="status" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <a href="view-user?id=<?php echo $id; ?>" class='btn btn-dark btn-sm'>View</a>
                                                                            <button type="submit" name="update_user_status_active_btn" class="btn btn-success btn-sm text-white">Unblock</button>
                                                                        </form>             
                                                                    </div>
                                                                    <!--<a href="edit-admin?id=<?php echo $id; ?>" class='btn btn-success btn-sm'><i class="bi bi-pen"></i></a> -->
                                                                </td>
                                                            </tr>
                                                    <?php
                                                            $admin_id++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    </div>

<?php 
include "./components/delete-modals.php";
include "./components/footer.php"; 
?>