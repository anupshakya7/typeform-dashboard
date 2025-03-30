
//table text participants name truncate
document.addEventListener('DOMContentLoaded', function () {
    const participantsNames = document.querySelectorAll('.participants-name');

    participantsNames.forEach(name => {
        const fullText = name.textContent.trim();
        
        const words = fullText.split(' ');

        if (words.length > 10) {
            const truncatedText = words.slice(0, 10).join(' ') + '...'; 

            name.textContent = truncatedText;

            const showMoreLink = document.createElement('a');
            showMoreLink.href = '#';
            showMoreLink.className = 'show-more-less text-primary text-decoration-none ms-1';
            showMoreLink.textContent = 'show More';

            name.parentNode.insertBefore(showMoreLink, name.nextSibling);

          
            showMoreLink.addEventListener('click', function (e) {
                e.preventDefault();

                if (name.textContent === truncatedText) {
                    name.textContent = fullText; 
                    this.textContent = 'show Less';
                } else {
                    name.textContent = truncatedText; 
                    this.textContent = 'show More';
                }
            });
        }
    });
});

let syncFormBtn = document.getElementById("syncFormBtn");

// if (syncFormBtn) {
//     syncFormBtn.addEventListener("click", function () {
//         let inputField = document.getElementById("form_id");
//         let icon = this.querySelector("i");

//         if (inputField.value.trim() === "") {
//             return; 
//         }

//         icon.classList.add("rotate");

//         setTimeout(() => {
//             icon.classList.remove("rotate");
//         }, 2000);
//     });
// }


document.addEventListener("DOMContentLoaded", function () {
    const currentUrl = window.location.href;
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

    navLinks.forEach(link => {
        if (link.href === currentUrl) {
            link.classList.add("active-nav");
            link.style.backgroundColor = "#f0f0f0";

            let parentNavItem = link.closest(".nav-item");
            if (parentNavItem) {
                parentNavItem.classList.add("active-nav");
                parentNavItem.style.backgroundColor = "#f0f0f0";
            }

            let collapseMenu = link.closest(".menu-dropdown");
            if (collapseMenu) {
                collapseMenu.classList.add("show");
                let mainParentNavItem = collapseMenu.closest(".nav-item");
                if (mainParentNavItem) {
                    mainParentNavItem.classList.add("active-nav");
                    mainParentNavItem.style.backgroundColor = "#f0f0f0";
                }
            }
        }
    });

    // Handle click event on nav-items to keep the active state
    const navItems = document.querySelectorAll(".navbar-nav .nav-item");
    navItems.forEach(item => {
        item.addEventListener("click", function (event) {
            event.stopPropagation();

            navItems.forEach(navItem => {
                navItem.classList.remove("active-nav");
                navItem.style.backgroundColor = "";
            });

            this.classList.add("active-nav");
            this.style.backgroundColor = "#f0f0f0";
        });
    });

    // Handle dropdown toggle state
    const dropdownMenus = document.querySelectorAll(".collapse.menu-dropdown");
    dropdownMenus.forEach(menu => {
        menu.addEventListener("shown.bs.collapse", function () {
            let parentNavItem = menu.closest(".nav-item");
            if (parentNavItem) {
                parentNavItem.classList.add("active-nav");
                parentNavItem.style.backgroundColor = "#f0f0f0";
            }
        });

        menu.addEventListener("hidden.bs.collapse", function () {
            let parentNavItem = menu.closest(".nav-item");
            if (parentNavItem && !parentNavItem.querySelector(".active-nav")) {
                parentNavItem.classList.remove("active-nav");
                parentNavItem.style.backgroundColor = "";
            }
        });
    });
});




//survey begin js
const btnshow = document.querySelector('#show-data');
const selectSurvey = document.querySelector('.select-survey'); // Selects the first element with the class 'select-survey'

// Check if both elements exist before adding event listener
if (btnshow && selectSurvey) {
  btnshow.addEventListener('click', function () {
    // Set the display property to 'block'
    selectSurvey.style.display = 'block';
    
  });
}


