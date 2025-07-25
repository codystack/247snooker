//Greet User
var time = new Date().getHours();
if (time < 4) {
    xgreeting = "You should be in bed 🙄!";
} else if (time < 12) {
    xgreeting = "Good morning 🌤"; //wash your hands
} else if (time < 16) {
    xgreeting = "It's lunch 🍛 time "; //what's on the menu!
} else {
    xgreeting = "Good Evening 🌙 "; //how was your day?
}
document.getElementById("greet").innerHTML = xgreeting;


//Datatables
// new DataTable('#admins');

//Window History
function goBack() {
  window.history.back()
}


//CKeditor
ClassicEditor
.create( document.querySelector( '#oilSpillResponse' ) )
.catch( error => {
    console.error( error );
} );