const menu =()=> {

  const body = document.querySelector("body");
  const navlinks = document.querySelectorAll('.nav-link_menu li');

  // Get the modal
  const modal_menu = document.getElementById("myModal_menu");

  // Get the button that opens the modal
  const btn_menu = document.getElementById("myBtn_menu");

  // Get the <span> element that closes the modal
  const span_menu = document.getElementsByClassName("close_menu")[0];

  // When the user clicks the button, open the modal 
  btn_menu.onclick = function() {
    modal_menu.style.display = "block";
    function disableScroll() { document.body.style.overflow="hidden";  }
    disableScroll()

  }

  // When the user clicks on <span> (x), close the modal
  span_menu.onclick = function() {
    modal_menu.style.display = "none";
    function enableScroll() { document.body.style.overflow="initial";  }
    enableScroll()
    
  }

  // When the user clicks anywhere outside of the modal, close it
  body.onclick = function(event) {
      if (event.target == modal_menu) {
      modal_menu.style.display = "none";
      function enableScroll() { document.body.style.overflow="initial";  }
      enableScroll()
    }
  }

  navlinks.forEach((link, index)=> {
    if (link.style.animation) {
        link.style.animation='';
    } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
    }
  });

}

menu();






// .........................................................

// function noscroll(){
//   window.scrollTo(0,0)
// }

// window.addEventListener("scroll", noscroll);
