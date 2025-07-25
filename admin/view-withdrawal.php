<?php
    $page = "Quote";
    include "./components/header.php";
    include "./components/modals.php";
    require_once "./auth/delete.php";
    require_once "./auth/update.php";
?>
    <div class="d-flex flex-column flex-lg-row h-lg-100 gap-1">
        <?php include "./components/side-nav.php"; ?>
        <div class="flex-lg-fill overflow-x-auto ps-lg-1 vstack vh-lg-100 position-relative">
            <?php include "./components/topnav.php"; ?>
            <div class="flex-fill overflow-y-lg-auto scrollbar bg-body rounded-top-4 rounded-top-start-lg-4 rounded-top-end-lg-0 border-top border-lg shadow-2">
                <main class="container-fluid px-3 py-5 p-lg-6 p-xxl-8">
                    <?php

                        $quoteID = $_GET['id'];
                                    
                        $select_query = "SELECT * FROM quote WHERE quoteID ='$quoteID'";
                        $result = mysqli_query($conn, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $quoteID = $row['quoteID'];
                                $firstName = $row['firstName'];
                                $lastName = $row['lastName'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $company = $row['company'];
                                $service = $row['service'];
                                $description = $row['description'];
                                $requestDate = $row['requestDate'];
                                $status = $row['status'];
                                $date = strtotime($requestDate);
                                switch ($status) {
                                    case "Closed";
                                        $class  = 'bg-danger';
                                        $text  = 'text-danger';
                                        break;
                                    case "Open";
                                        $class  = 'bg-success';
                                        $text  = 'text-success';
                                        break;
                                    default:
                                        $class  = '';
                                }
                            }
                        }

                    ?>

                    <div class="mb-6 mb-xl-10">
                        <div class="row g-3 align-items-center">
                            <div class="col">
                                <h3 class="ls-tight"><?php echo $company; ?>'s Enquiry</h3>
                            </div>
                            <div class="col">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" onclick="goBack()" class="btn btn-sm btn-neutral d-sm-inline-flex"><span class="pe-2"><i class="bi bi-arrow-left"></i> </span><span>Go Back</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2"><label class="form-label">Full Name</label></div>
                            <div class="col-md-8 col-xl-5">
                                <div class=""><input type="text" value="<?php echo $firstName; ?> <?php echo $lastName; ?>" class="form-control" disabled></div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2"><label class="form-label">Email</label></div>
                            <div class="col-md-8 col-xl-5">
                                <div class=""><input type="text" value="<?php echo $email; ?>" class="form-control" disabled></div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2"><label class="form-label">Phone</label></div>
                            <div class="col-md-8 col-xl-5">
                                <div class=""><input type="text" value="<?php echo $phone; ?>" class="form-control" disabled></div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2"><label class="form-label">Company</label></div>
                            <div class="col-md-8 col-xl-5">
                                <div class=""><input type="text" value="<?php echo $company; ?>" class="form-control" disabled></div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2"><label class="form-label">Service</label></div>
                            <div class="col-md-8 col-xl-5">
                                <div class=""><input type="text" value="<?php echo $service; ?>" class="form-control" disabled></div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2"><label class="form-label">Project Description</label></div>
                            <div class="col-md-8 col-xl-5">
                                <div class=""><textarea type="text" rows="7" class="form-control" disabled><?php echo $description; ?></textarea></div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2"><label class="form-label">Request Date</label></div>
                            <div class="col-md-8 col-xl-5">
                                <div class=""><input type="text" value="<?php echo date('j F Y', $date); ?>" class="form-control" disabled></div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2"><label class="form-label">Status</label></div>
                            <div class="col-md-8 col-xl-5">
                                <span class="badge <? echo $class; ?> bg-opacity-25 text-xs <? echo $text; ?>"><?php echo $status; ?></span>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <div class="col-md-2"></div>
                            <div class="col-md-5 text-end">
                                <div style="display: <?php if ($status == 'Closed'){ echo 'none';}else{ echo 'unset';}?>">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                        <div class="row align-items-center mb-10" style="display: none;">
                                            <div class="col-md-2">
                                                <label class="form-label">Quote ID</label>
                                            </div>
                                            <div class="col-md-8 col-xl-5">
                                                <div class="">
                                                    <input type="number" value="<?php echo $quoteID; ?>" name="quoteID" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="update_quote_btn" class="btn btn-dark">Mark as closed</button>
                                    </form>
                                </div>
                                <button type="button" data-id="<? echo $quoteID; ?>" onclick="confirmQuoteDelete(this);" class="button btn btn-danger"><i class="bi bi-trash"></i> Delete Request</button>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

<?php 
include "./components/delete-modals.php";
include "./components/footer.php"; 
?>