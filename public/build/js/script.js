//flatpicker js
document.addEventListener('DOMContentLoaded', function () {
    // Initialize Flatpickr
    flatpickr('[data-provider="flatpickr"]', {
        dateFormat: 'd M, Y',
        enableTime: false, 
        mode: 'range', 
    });
});

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
    
    // Add active-nav to the current URL nav-item
    navLinks.forEach(link => {
        if (link.href === currentUrl) {
            link.classList.add("active-nav");
            let parent = link.closest(".nav-item");
            if (parent) {
                parent.classList.add("active-nav");
            }
            
            // If inside a dropdown, make sure it's expanded
            let collapseParent = link.closest(".collapse.menu-dropdown");
            if (collapseParent && collapseParent.classList.contains("show")) {
                collapseParent.classList.add("show");
                let mainParent = collapseParent.closest(".nav-item");
                if (mainParent) {
                    mainParent.classList.add("active-nav");
                }
            }
        }
    });

    // Add click event to dropdown links
    const dropdownLinks = document.querySelectorAll(".menu-link");
    dropdownLinks.forEach(link => {
        link.addEventListener("click", function () {
            // Remove active class from all nav-items except the current one
            const allNavItems = document.querySelectorAll(".navbar-nav .nav-item");
            allNavItems.forEach(item => {
                const itemLink = item.querySelector('.nav-link');
                if (itemLink && itemLink.href !== currentUrl) {
                    item.classList.remove("active-nav");
                }
            });

            let parentNavItem = this.closest(".nav-item");
            if (parentNavItem) {
                // Toggle active-nav class on the parent nav-item based on dropdown open/close
                const collapse = parentNavItem.querySelector(".collapse.menu-dropdown");
                if (collapse && collapse.classList.contains("show")) {
                    parentNavItem.classList.add("active-nav");
                } else {
                    parentNavItem.classList.remove("active-nav");
                }
            }
        });
    });

    // Detect state change on dropdowns (open/close)
    const dropdownMenus = document.querySelectorAll('.collapse.menu-dropdown');
    dropdownMenus.forEach(menu => {
        menu.addEventListener('shown.bs.collapse', function () {
            let parentNavItem = menu.closest(".nav-item");
            if (parentNavItem) {
                parentNavItem.classList.add("active-nav");
            }
        });
        
        menu.addEventListener('hidden.bs.collapse', function () {
            let parentNavItem = menu.closest(".nav-item");
            if (parentNavItem) {
                parentNavItem.classList.remove("active-nav");
            }
        });
    });
});
