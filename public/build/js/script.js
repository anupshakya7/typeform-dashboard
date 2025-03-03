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
document.getElementById("syncFormBtn").addEventListener("click", function () {
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
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".nav-item").forEach(link => {
        link.addEventListener("click", () => {
            // Remove 'active' class from all nav-items
            document.querySelectorAll(".nav-item").forEach(item => item.classList.remove('active'));

            // Add 'active' class to the clicked nav-item
            link.classList.add('active');
        });
    });
});


