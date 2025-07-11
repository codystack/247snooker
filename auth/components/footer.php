<!-- Referral modal -->
<?php
include "./modals/referral.php";
include "./modals/custom-amount.php";
include "./modals/delete.php";
include "./modals/withdrawal.php";
?>
    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row align-items-center g-0 border-top py-2">
                <!-- Desc -->
                <div class="col-md-12 col-12 text-center">
                    <span>© <script>document.write(new Date().getFullYear());</script> 247Snooker. All Rights Reserved.</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/odometer/odometer.min.js"></script>
    <script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
    <script src="assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="assets/libs/jQuery.print/jQuery.print.js"></script>
    <script src="assets/libs/prismjs/prism.js"></script>
    <script src="assets/libs/prismjs/components/prism-scss.min.js"></script>
    <script src="assets/libs/@yaireo/tagify/dist/tagify.min.js"></script>
    <script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="assets/libs/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="assets/libs/jsvectormap/dist/maps/world.js"></script>
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
    <script src="assets/js/theme.min.js"></script>
    <script src="assets/js/pay.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js'></script>

    <script>
        function confirmDelete(self) {
            var id = self.getAttribute("data-id");
        
            document.getElementById("form-delete-user").id.value = id;
            $("#userDeleteModal").modal("show");
        }
    </script>
    <!-- Password Matching-->
    <script>
        $('#confirmpassword').on('keyup', function () {
            if ($('#newpassword').val() == $('#confirmpassword').val()) {
                $('#message').html('Password matched😜').css('color', 'green');
            } else
                $('#message').html('Password did not match😡').css('color', 'red');
        });
    </script>

    <?php
        if (isset($_SESSION['message'])) {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['message_title']; ?>",
                text: "<?php echo $_SESSION['message']; ?>",
                icon: "error",
                buttons: false,
                timer: 5000
            }).then(function() {
                window.location = "./fund-wallet";
            });
        </script>
    <?php
        unset($_SESSION['message']);
    }
    ?>

    <?php
        if (isset($_SESSION['withdraw_message'])) {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['withdraw_message_title']; ?>",
                text: "<?php echo $_SESSION['withdraw_message']; ?>",
                icon: "error",
                buttons: false,
                timer: 5000
            }).then(function() {
                window.location = "./withdrawal";
            });
        </script>
    <?php
        unset($_SESSION['withdraw_message']);
    }
    ?>

    <?php
        if (isset($_SESSION['success_message'])) {
            $id = $_GET['id'];
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['success_message_title']; ?>",
                text: "<?php echo $_SESSION['success_message']; ?>",
                icon: "success",
                buttons: false,
                timer: 4000
            }).then(function() {
                window.location = "./subscription";
            });
        </script>
    <?php
        unset($_SESSION['success_message']);
        }
    ?>


    <?php
        if (isset($_SESSION['successx_message'])) {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['successx_message_title']; ?>",
                text: "<?php echo $_SESSION['successx_message']; ?>",
                icon: "success",
                buttons: false,
                timer: 4000
            }).then(function() {
                window.location = "./bank";
            });
        </script>
    <?php
        unset($_SESSION['successx_message']);
        }
    ?>


    <?php
        if (isset($_SESSION['withdraw_success_message'])) {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['withdraw_success_message_title']; ?>",
                text: "<?php echo $_SESSION['withdraw_success_message']; ?>",
                icon: "success",
                buttons: false,
                timer: 4000
            }).then(function() {
                window.location = "./withdrawal";
            });
        </script>
    <?php
        unset($_SESSION['withdraw_success_message']);
        }
    ?>

    <script>
        $(document).ready(function(){
            $('.showbtn').click(function(){
                $('#showhideForm').hide(500);
                $('#hideshowForm').show(500);
            });
            $('.hidebtn').click(function(){
                $('#showhideForm').show(500);
                $('#hideshowForm').hide(500);
            });
        });
    </script>

    <script>
        function triggerClick(e) {
            document.querySelector('#picture').click();
        }
        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>

    <!-- Copy Referral Link -->
    <script>
        function copyToClipboard() {
            var copyText = document.getElementById("referralCode").value;
            navigator.clipboard.writeText(copyText).then(() => {
            });
        }

        var alertPlaceholder = document.getElementById('clipboardAlert')
        var alertTrigger = document.getElementById('clipboardAlertBtn')

        function alert(message, type) {
        var wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

        alertPlaceholder.append(wrapper)
        }

        if (alertTrigger) {
            alertTrigger.addEventListener('click', function () {
                alert('Referral code copied to clipboard', 'success');
            });
        }
    </script>
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
    <script>
        $(document).ready( function () {
            $('#allTransactions').DataTable();
        } );
        $(document).ready( function () {
            $('#allSupport').DataTable();
        } );
    </script>
    <script>
        function close_window() {
            if (confirm("Close Window?")) {
                close();
            }
        }
    </script>

</body>

</html>