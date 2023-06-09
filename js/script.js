const navbarItems =document.querySelector(".navbar-items");
const openNavbarBtn =document.querySelector(".open-navbar-btn");
const closeNavbarBtn =document.querySelector(".close-navbar-btn");

//?? opens nav dropdown
const openNav = () => {
  navbarItems.style.display = 'flex';
  openNavbarBtn.style.display = "none";
  closeNavbarBtn.style.display = "inline-block";
}

//?? closes nav dropdown
const closeNav = () => {
  navbarItems.style.display = 'none';
  openNavbarBtn.style.display = "inline-block";
  closeNavbarBtn.style.display = "none";
}

openNavbarBtn.addEventListener("click",openNav);
closeNavbarBtn.addEventListener("click",closeNav);
