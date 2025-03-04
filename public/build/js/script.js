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

if (syncFormBtn) {
    syncFormBtn.addEventListener("click", function () {
        let inputField = document.getElementById("form_id");
        let icon = this.querySelector("i");

        if (inputField.value.trim() === "") {
            return; 
        }

        icon.classList.add("rotate");

        setTimeout(() => {
            icon.classList.remove("rotate");
        }, 2000);
    });
}


document.addEventListener("DOMContentLoaded", function() {
    const navItemsContainer = document.querySelector(".navbar-nav");

    if (navItemsContainer) {
        const navItems = navItemsContainer.querySelectorAll(".nav-item");

        // Set active class based on URL hash
        const hash = window.location.hash;
        if (hash) {
            const activeNavItem = document.querySelector(`.nav-item a[href="${hash}"]`).parentElement;
            if (activeNavItem) {
                activeNavItem.classList.add("active");
            }
        } else if (navItems.length > 0) {
            navItems[0].classList.add("active");
        }

        navItemsContainer.addEventListener("click", function(event) {
            const navItem = event.target.closest('.nav-item');
            if (navItem) {
                navItems.forEach(function(item) {
                    item.classList.remove("active");
                });

                navItem.classList.add("active");
                console.log('Nav item clicked!');

                // Update URL hash
                const href = navItem.querySelector('a').getAttribute('href');
                window.location.hash = href;
            }
        });
    }
});
