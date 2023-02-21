/* MAIN MENU */
const menuMobile = document.querySelector('#nav-icon3');
const menuMobileContent = document.querySelector('#menuMobileNav');

menuMobile.addEventListener('click', (e) => {
    menuMobile.classList.toggle("openButton");
    menuMobileContent.classList.toggle("openContentMobileNav");
});

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
    }
}

/* SIDEPANEL SUB-MENUS */
const subMenuItems = document.querySelectorAll(".btnExpand");

subMenuItems.forEach(function(subMenuItem) {
    subMenuItem.addEventListener("click", function () {
		const vertical = this.querySelector('.btnVertical');
		vertical.classList.toggle('rotateSubmenuMobile');
        const submenu = this.parentNode.querySelector('.submenuMobile');
        submenu.classList.toggle('openSubMenu');
    });
});
