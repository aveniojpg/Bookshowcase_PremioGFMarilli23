function toggleMenu() {
    var menuBox = document.getElementById('menudesktop');    
    var dropdown = document.getElementById('dropdown')
    if(dropdown.style.display == "block") { // if is menuBox displayed, hide it
      dropdown.style.display = "none";
    }
    else { // if is menuBox hidden, display it
      dropdown.style.display = "block";
    }
  }