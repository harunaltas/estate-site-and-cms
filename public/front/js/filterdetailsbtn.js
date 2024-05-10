const el = document.getElementById('filterdetails');
const button = document.getElementById('filterdetailsbutton');
var isOpen = false;
button.addEventListener("click", function (e) {
 e.preventDefault();

 if(isOpen == false)
 {
   el.classList.add("filterOpen");
   isOpen = true;
 }
 else {
   el.classList.remove("filterOpen");
   isOpen = false;
 }

});