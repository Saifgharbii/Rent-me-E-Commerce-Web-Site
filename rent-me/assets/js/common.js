let mySidenav = document.getElementById("mySidenav");
let navIsOpen = false;
function openNav() {
  mySidenav.style.width = "250px";
  navIsOpen = true;
}

function closeNav() {
  mySidenav.style.width = "0";
  navIsOpen = false;
}

function toggleNav() {
  if (navIsOpen) {
    closeNav();
  } else {
    openNav();
  }
}
