<?php
include_once "./auth/withdraw-query.php";
?>
<div class="modal fade" id="withdrawalModal" tabindex="-1" aria-labelledby="withdrawalModalLabel" aria-hidden="true">
    <!-- <div class="col-md-8 col-lg-6 mx-auto">
        <div class="mb-3 mt-3" id="clipboardAlert"></div>
    </div> -->
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="text-center">
                <?php
                    $select_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
                    $result = mysqli_query($conn, $select_query);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $bonus = $row['bonus'];
                ?>
                <p class="text-primary">
                    Balance<br />
                    <span class="fw-bold text-dark fs-2">₦<?php echo number_format($bonus, 2, '.', ','); ?></span>
                </p>
                <?php 
                }
                    }
                ?>
                <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 mx-auto mt-4 mb-4">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" name="userID" placeholder="GDIS47538A" value="<?php echo $_SESSION['id']; ?>" readonly hidden/>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">₦</span>
                            <input type="number" class="form-control" name="amount" placeholder="1000" aria-label="amount" required aria-describedby="amount-button">
                            <span class="input-group-text">.00</span>
                        </div>

                        <div class="mb-3">
                            <select class="form-select form-control" name="accountInfo" required>
                                <option disabled="disabled" value="null" selected>Select Bank Account</option>
                                <?php
                                    $select_query = "SELECT users.id, banks.bankCode, banks.bankName, bankaccounts.userID, bankaccounts.bankCode, bankaccounts.accountName, bankaccounts.accountNumber FROM bankaccounts 
                                                    INNER JOIN banks ON bankaccounts.bankCode = banks.bankCode 
                                                    INNER JOIN users ON bankaccounts.userID = users.id WHERE users.id = '$id'";
                                    $result = mysqli_query($conn, $select_query);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $bankCode = $row['bankCode'];
                                            $bankName = $row['bankName'];
                                            $accountName = $row['accountName'];
                                            $accountNumber = $row['accountNumber'];
                                        
                            
                                echo "<option value='".$accountName. " :: ".$accountNumber." :: ".$bankName."' class='text-uppercase'>" .$accountName." - ".$bankName."</option>";
                                
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="withdrawal-btn">Make Withdrawal</button>
                        </div>
                    </form>
                </div>
                <a href="add-account" class="text-primary" target="_self"><i class="bi bi-plus-circle-fill"></i> Add Bank Account</a>
                
          </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>