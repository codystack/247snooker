<div class="modal fade" id="referralModal" tabindex="-1" aria-labelledby="referralModalLabel" aria-hidden="true">
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
                <img src="./assets/images/svg/giftbox.svg" alt="referral icon" width="160px">
                <h2 class="mt-5 fw-bold">Refer and Earn</h2>
                <p class="mt-3">
                    You get a ₦1,000 wallet bonus instantly as soon as your friends signup on GDIS using your referral code.
                </p>
                <div class="mb-3 mt-3" id="clipboardAlert"></div>
                <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 mx-auto mt-4 mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control text-uppercase" value="<?php echo $agentID;?>" aria-label="agentID" id="referralCode" aria-describedby="button-addon2" disabled>
                        <button class="btn btn-primary" type="button" onClick="copyToClipboard()" id="clipboardAlertBtn"><i class="fe fe-copy"></i></button>
                    </div>
                </div>
                
          </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>