<?php
include_once "./auth/voucher-query.php";
?>
<div class="modal fade" id="rechargeModal" tabindex="-1" aria-labelledby="rechargeModalLabel" aria-hidden="true">
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
          <img src="./assets/images/png/card6.png" alt="recharge icon" width="160px">
          <p class="mt-3">
              Enter preferred voucher amount.
          </p>
          <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 mx-auto mt-4 mb-4">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
                  <div class="form-floating mb-4">
                      <input type="text" class="form-control" name="userID" placeholder="GDIS47538A" value="<?php echo $_SESSION['id']; ?>" readonly hidden/>
                  </div>

                  <div class="input-group mb-4">
                      <span class="input-group-text">₦</span>
                      <input type="number" class="form-control" name="amount" placeholder="1000" aria-label="amount" required aria-describedby="amount-button">
                      <span class="input-group-text">.00</span>
                  </div>

                  <div class="d-grid gap-2">
                      <button class="btn btn-primary" type="submit" name="voucher_custom_btn">Buy Voucher</button>
                  </div>
              </form>
          </div>
              
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>