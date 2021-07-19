let humbergerMenu = document.querySelector(".humberger-icon");
let navbarNav = document.querySelector(".navbar-nav");


if(screen.width <= 767) {
    navbarNav.classList.add("navbar-mobile");
}

humbergerMenu.addEventListener("click", () => {
    if(navbarNav.style.display == 'none') {
        navbarNav.style.display = 'flex';
        humbergerMenu.children[0].style.backgroundColor = "rgba(0, 0, 0, 1)";
        humbergerMenu.children[1].style.backgroundColor = "rgba(0, 0, 0, 1)";
        humbergerMenu.children[2].style.backgroundColor = "rgba(0, 0, 0, 1)";
    } else {
        navbarNav.style.display = 'none';
        humbergerMenu.children[0].style.backgroundColor = "rgba(0, 0, 0, 0.55)";
        humbergerMenu.children[1].style.backgroundColor = "rgba(0, 0, 0, 0.55)";
        humbergerMenu.children[2].style.backgroundColor = "rgba(0, 0, 0, 0.55)";
    }
});

function socialMedia(link){
    return window.open("https://"+ link); 
}

function dropdownLinks(id) {
    sibling = document.getElementById(id);

    if(sibling.nextElementSibling.style.display == "none") {
        return sibling.nextElementSibling.style.display = "block";
        
    }
    return sibling.nextElementSibling.style.display = "none";
 }

