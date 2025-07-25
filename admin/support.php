<?php
    $page = "Support";
    include "./components/header.php";
    include "./components/modals.php";
    require_once "./auth/queries.php";
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
                                <h3 class="ls-tight">Support</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 g-xxl-6">
                        <div class="col-xxl-12">
                            <div class="vstack gap-3 gap-md-6">
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="table-responsive mb-10 mt-5">
                                            <table id="support" class="table table-hover table-striped table-sm table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <div class="d-flex align-items-center gap-2 ps-1">
                                                                <span>Full Name</span>
                                                            </div>
                                                        </th>
                                                        <th scope="col">Purpose</th>
                                                        <th scope="col">Comment</th>
                                                        <th scope="col">Enquiry Date</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col" class="d-none text-end d-xl-table-cell">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $support_id = 1;
                                                    $select_query = "SELECT * FROM support ORDER BY requestDate ASC";
                                                    $result = mysqli_query($conn, $select_query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        // output data of each row
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $id = $row['id'];
                                                            $firstName = $row['firstName'];
                                                            $lastName = $row['lastName'];
                                                            $purpose = $row['purpose'];
                                                            $comment = $row['comment'];
                                                            $commentlength=30; // Define how many character you want to display.
                                                            $comment = substr($comment, 0, $commentlength);
                                                            $status = $row['status'];
                                                            $requestDate = $row['requestDate'];
                                                            $date = strtotime($requestDate);
                                                            switch ($status) {
                                                                case "Answered";
                                                                    $class  = 'bg-danger';
                                                                    $text = 'text-danger';
                                                                    $response = 'Closed';
                                                                    break;
                                                                case "Open";
                                                                    $class  = 'bg-success';
                                                                    $text = 'text-success';
                                                                    $response = 'Open';
                                                                    break;
                                                                default:
                                                                    $class  = '';
                                                            }
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center gap-3 ps-1">
                                                                        <div class="icon icon-shape w-rem-10 h-rem-10 rounded-circle text-sm bg-primary bg-opacity-25 text-primary"><i class="bi bi-headset"></i></div>
                                                                        <div><span class="d-block text-heading fw-bold"><?php echo $firstName; ?> <?php echo $lastName; ?></span></div>
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $purpose; ?></td>
                                                                <td><?php echo $comment; ?>...</td>
                                                                <td><?php echo date('j F Y', $date); ?></td>
                                                                <td><span class="badge <? echo $class; ?> bg-opacity-25 text-xs <? echo $text; ?>"><?php echo $response; ?></span></td>
                                                                <td class="text-end">
                                                                    <a href="view-support?id=<?php echo $id; ?>" class='btn btn-dark btn-sm'><i class="bi bi-eye"></i></a>
                                                                    <button type="button" data-id="<? echo $id; ?>" onclick="confirmSupportDelete(this);" class='btn btn-danger btn-sm'><i class="bi bi-trash"></i></button>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                            $support_id++;
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