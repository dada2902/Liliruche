const panier =() => {
    // Get the modal
    const modal_panier = document.getElementById("myModal_panier");
  
    // Get the button that opens the modal
    const btn_panier = document.getElementById("myBtn_panier");
  
    // Get the <span> element that closes the modal
    const span_panier = document.getElementsByClassName("close_panier")[0];
  
    // When the user clicks the button, open the modal 
    btn_panier.onclick = function() {
      modal_panier.style.display = "block";
      function disableScroll() { document.body.style.overflow="hidden";  }
      disableScroll()
    }
  
    // When the user clicks on <span> (x), close the modal
    span_panier.onclick = function() {
      modal_panier.style.display = "none";
      function enableScroll() { document.body.style.overflow="initial";  }
      enableScroll()
    }
  
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal_panier) {
        modal_panier.style.display = "none";
        function enableScroll() { document.body.style.overflow="initial";  }
        enableScroll()
      }
    }
  
}
  
panier();
  