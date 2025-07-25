//Admin Delete Trigger
function confirmAdminDelete(self) {
    var id = self.getAttribute("data-id");

    document.getElementById("form-delete-admin").id.value = id;
    $("#adminDeleteModal").modal("show");
}


//Support Delete Trigger
function confirmSupportDelete(self) {
    var id = self.getAttribute("data-id");

    document.getElementById("form-delete-support").id.value = id;
    $("#supportDeleteModal").modal("show");
}


//Quote Delete Trigger
function confirmQuoteDelete(self) {
    var id = self.getAttribute("data-id");

    document.getElementById("form-delete-quote").id.value = id;
    $("#quoteDeleteModal").modal("show");
}


//Certificate Delete Trigger
function confirmCertificateDelete(self) {
    var id = self.getAttribute("data-id");

    document.getElementById("form-delete-certificate").id.value = id;
    $("#certificateDeleteModal").modal("show");
}



//Contestant Delete Trigger
function confirmContestantDelete(self) {
    var id = self.getAttribute("data-id");

    document.getElementById("form-delete-contestant").id.value = id;
    $("#contestantDeleteModal").modal("show");
}