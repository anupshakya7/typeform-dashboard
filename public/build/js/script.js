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


/**download data js */
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("export-pdf").addEventListener("click", exportToPDF);
    document.getElementById("export-png").addEventListener("click", exportToPNG);
    document.getElementById("export-excel").addEventListener("click", exportToExcel);
});

function exportToPDF() {
    // Capture the chart title
    const chartTitle = document.querySelector(".card-title").innerText;

    // Capture the logo (assuming the logo is an img element with a specific class or ID)
    const logo = document.querySelector(".logo img"); // Adjust the selector to match your logo element
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image
    html2canvas(document.getElementById("sales-forecast-chart")).then(canvas => {
        const chartImgData = canvas.toDataURL("image/png");

        // Initialize PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: "landscape" });

        // Add logo to the PDF (if available)
        if (logoData) {
            pdf.addImage(logoData, "PNG", 10, 10, 30, 30); // Adjust dimensions and position as needed
        }

        // Add chart title to the PDF
        pdf.setFontSize(16);
        pdf.text(chartTitle, 50, 20); // Adjust position as needed

        // Add chart image to the PDF
        pdf.addImage(chartImgData, "PNG", 10, 40, 280, 150); // Adjust position and dimensions as needed

        // Save the PDF
        pdf.save("chart.pdf");
    });
}

function exportToPNG() {
    // Capture the chart title
    const chartTitle = document.querySelector(".card-title").innerText;

    // Capture the logo (assuming the logo is an img element with a specific class or ID)
    const logo = document.querySelector(".logo img"); // Adjust the selector to match your logo element
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image
    html2canvas(document.getElementById("sales-forecast-chart")).then(canvas => {
        const ctx = canvas.getContext("2d");

        // Create a new canvas to add logo, title, and chart image
        const newCanvas = document.createElement("canvas");
        const newCtx = newCanvas.getContext("2d");

        // Set the new canvas dimensions
        const padding = 20; // Padding around the chart
        const logoHeight = 30; // Height of the logo
        const titleHeight = 20; // Height of the title
        const chartHeight = canvas.height;
        const chartWidth = canvas.width;

        newCanvas.width = chartWidth + 2 * padding; // Add padding to the sides
        newCanvas.height = logoHeight + titleHeight + chartHeight + 3 * padding; // Add padding for logo, title, and chart

        // Fill the background with white
        newCtx.fillStyle = "#FFFFFF";
        newCtx.fillRect(0, 0, newCanvas.width, newCanvas.height);

        // Add logo to the new canvas (if available)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                newCtx.drawImage(logoImg, padding, padding, logoHeight, logoHeight); // Logo at top left

                // Add chart title below the logo
                newCtx.font = "16px Arial";
                newCtx.fillStyle = "#000000";
                newCtx.fillText(chartTitle, padding, padding + logoHeight + titleHeight); // Title below logo

                // Add the chart image below the title
                newCtx.drawImage(canvas, padding, padding + logoHeight + titleHeight + padding, chartWidth, chartHeight);

                // Create a link to download the image
                const link = document.createElement("a");
                link.href = newCanvas.toDataURL("image/png");
                link.download = "chart.png";
                link.click();
            };
        } else {
            // Add chart title to the new canvas
            newCtx.font = "16px Arial";
            newCtx.fillStyle = "#000000";
            newCtx.fillText(chartTitle, padding, padding + titleHeight); // Title at top left

            // Add the chart image below the title
            newCtx.drawImage(canvas, padding, padding + titleHeight + padding, chartWidth, chartHeight);

            // Create a link to download the image
            const link = document.createElement("a");
            link.href = newCanvas.toDataURL("image/png");
            link.download = "chart.png";
            link.click();
        }
    });
}
function exportToExcel() {
    // Get the table element
    const table = document.getElementById("sales-forecast-chart");

    // Convert the table to a worksheet using SheetJS
    const wb = XLSX.utils.table_to_book(table, { sheet: "Chart Data" });

    // Export the workbook to an Excel file
    XLSX.writeFile(wb, 'chart_data.xlsx');
}


