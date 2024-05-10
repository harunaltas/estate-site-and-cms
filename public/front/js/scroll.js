window.onscroll = function() {scrollFunction()};
const scroller = document.querySelector("#layout-content");
var element = document.getElementById("main");
const container = document.body;
scroller.addEventListener("scroll", (event) => {

  if(scroller.scrollTop > 200)
  {
    element.classList.add("main-flat");
    scroller.classList.add("content-flat");
   
  }
  else {
    element.classList.remove("main-flat");
    scroller.classList.remove("content-flat");
   
  }
});