/* MAIN MENU */
const menuMobile = document.querySelector('#nav-icon3');
const menuMobileContent = document.querySelector('#menuMobileNav');

menuMobile.addEventListener('click', (e) => {
    menuMobile.classList.toggle("openButton");
    menuMobileContent.classList.toggle("openContentMobileNav");
});

/* SIDEPANEL SUB-MENUS */
// const subMenuItems = document.querySelectorAll("#menuMobileNav > ul > li");

// subMenuItems.forEach(function(subMenuItem) {
//     subMenuItem.addEventListener("click", function () {
//         const submenu = this.querySelector('ul');
//         submenu.classList.toggle('openSubMenu');
//     });
// });

/* WINDOW SCROLL */
window.onscroll = function () {
    headerScroll();
};

const header = document.querySelector("#header");
let header_before = document.getElementsByClassName("header_before")[0];
let header_after = document.getElementsByClassName("header_after")[0];

function headerScroll() {
    if (window.pageYOffset > 300) {
        header.classList.add("scrollHeaderOn");
		header_before.style.display = 'none';
		header_after.style.display = 'none';
    } else {
        header.classList.remove("scrollHeaderOn");
				header_before.style.display = 'unset';
		header_after.style.display = 'unset';
    }
}
