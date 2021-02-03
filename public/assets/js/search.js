const search =() => {
    const bee = document.querySelector(".bee");

    // Get the modal
    const modal_search = document.getElementById("myModal_search");
  
    // Get the button that opens the modal
    const btn_search  = document.getElementById("myBtn_search");
  
    // Get the <span> element that closes the modal
    const span_panier = document.getElementsByClassName("close_search")[0];
  
    // When the user clicks the button, open the modal 
    btn_search.onclick = function() {
      modal_search.style.display = "block";
      function disableScroll() { document.body.style.overflow="hidden";  }
      disableScroll()

    }
  
    // When the user clicks on <span> (x), close the modal
    span_panier.onclick = function() {
      modal_search.style.display = "none";
      function enableScroll() { document.body.style.overflow="initial";  }
      enableScroll()
    }
  
    // When the user clicks anywhere outside of the modal, close it
    // bee.onclick = function(event) {
    //   if (event.target == modal_panier) {
    //     modal_search.style.display = "none";
    //   }
    // }
  
}
  
search();