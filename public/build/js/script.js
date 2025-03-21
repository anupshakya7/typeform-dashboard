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
    // Add a single event listener for all export actions
    document.querySelectorAll(".dropdown-item[data-type]").forEach(item => {
        item.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default link behavior

            const exportType = this.getAttribute("data-type"); // Get the export type (pdf, png, excel)
            const chartId = this.getAttribute("data-chart-id"); // Get the chart ID
            


            // Nested if-else for chartId and exportType
            if (chartId === "sales-forecast-chart") {
                const chartTitle = document.querySelector('.mean-score-bar-title')?.innerText || "Overview";

                if (exportType === "pdf") {
                    exportToPDF(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                } 
                else {
                    console.error("Unsupported export type for chart1:", exportType);
                }
            } else if (chartId === "basic_radar") {
                const chartTitle = document.querySelector('.mean-result-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDF(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            } 
            else if (chartId === "simple_pie_chart") {
                const chartTitle = document.querySelector('.pie-gender-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDF(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            else if (chartId === "simple_pie_chart2") {
                const chartTitle = document.querySelector('.pie-gender-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDF(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            else if (chartId === "sales-forecast-chart-2") {
                const chartTitle = document.querySelector('.positive-peace-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDF(chartId,chartTitle);
                }  else if (exportType === "excel") {
                    exportToExcel(chartId);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            
            else if (chartId === "sales-forecast-chart-3") {
                const chartTitle = document.querySelector('.negative-peace-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDF(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            } 
            else if (chartId === "multi_radar") {
                const chartTitle = document.querySelector('.results-by-pillar-radar')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDF(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            else if (chartId === "pillar-table") {
                const chartTitle = document.querySelector('.results-by-pillar-table')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDF(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                } else if (exportType === "excel") {
                    exportToExcel(chartId,chartTitle);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            } else {
                console.error("Unsupported chart ID:", chartId);
            }
        });
    });
});

function exportToPDF(chartId, chartTitle) {
    // Capture the logo (assuming the logo is an img element with a specific class or ID)
    const logo = document.querySelector(".logo img"); // Adjust the selector to match your logo element
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image
    html2canvas(document.getElementById(chartId), {
        scale: 2, // Increase scale for higher resolution
    useCORS: true, // Enable CORS if images are from external sources
    }).then(canvas => {
        const chartImgData = canvas.toDataURL("image/png");

        // Initialize PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: "landscape" });

        // Define margins and dimensions
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        const margin = 20; // Margin from the edges
        const logoWidth = 30; // Width of the logo
        const logoHeight = 30; // Height of the logo
        const titleFontSize = 16;
        const titleLineHeight = 20; // Line height for the title

        // Add a black border around the content
        pdf.setDrawColor(0); // Set border color to black
        pdf.setLineWidth(1); // Set border thickness
        pdf.rect(margin, margin, pageWidth - 2 * margin, pageHeight - 2 * margin); // Draw border

        // Add logo to the PDF (if available)
        if (logoData) {
            pdf.addImage(logoData, "PNG", margin + 10, margin + 10, logoWidth, logoHeight); // Position logo inside the border
        }

        // Add chart title to the PDF (after the logo, centered a bit higher)
        pdf.setFontSize(titleFontSize);
        pdf.setTextColor(0); // Ensure text color is black
        const titleX = margin + logoWidth + 20; // Position title after the logo with extra spacing
        const titleY = margin + 30; // Move title a bit higher (adjust as needed)
        pdf.text(chartTitle, titleX, titleY);

        // Calculate the position for the chart image to center it
        const chartImgWidth = pageWidth - 2 * margin - 20; // Chart width (full width minus margins and padding)
        const chartImgHeight = (chartImgWidth * canvas.height) / canvas.width; // Maintain aspect ratio
        const chartImgX = margin + 10; // Centered horizontally inside the border
        const chartImgY = titleY + titleLineHeight + 0; // Position below the title with some spacing

        // Add chart image to the PDF
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight);

        // Save the PDF
        pdf.save(`${chartTitle}.pdf`);
    });
}
function exportToPNG(chartId, chartTitle) {
    // Capture the logo (assuming the logo is an img element with a specific class or ID)
    const logo = document.querySelector(".logo img"); // Adjust the selector to match your logo element
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image with higher resolution
    html2canvas(document.getElementById(chartId), {
        scale: 2, // Increase scale for higher resolution
        useCORS: true, // Allow cross-origin images (if needed)
    }).then(canvas => {
        const ctx = canvas.getContext("2d");

        // Create a new canvas to add logo, title, and chart image
        const newCanvas = document.createElement("canvas");
        const newCtx = newCanvas.getContext("2d");

        // Set the new canvas dimensions
        const padding = 50; // Padding around the content
        const borderWidth = 1; // Border width
        const logoHeight = 220; // Increased logo height
        const titleHeight = 30; // Height of the title
        const chartHeight = canvas.height;
        const chartWidth = canvas.width;

        // Calculate the total width and height of the new canvas
        const totalWidth = chartWidth + 2 * padding + 2 * borderWidth;
        const totalHeight = logoHeight + titleHeight + chartHeight + 3 * padding + 2 * borderWidth;

        newCanvas.width = totalWidth;
        newCanvas.height = totalHeight;

        // Fill the background with white
        newCtx.fillStyle = "#FFFFFF";
        newCtx.fillRect(0, 0, newCanvas.width, newCanvas.height);

        // Draw the black border around the content
        newCtx.strokeStyle = "#000000";
        newCtx.lineWidth = borderWidth;
        newCtx.strokeRect(borderWidth / 2, borderWidth / 2, totalWidth - borderWidth, totalHeight - borderWidth);

        // Add logo to the new canvas (if available)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                // Draw the logo on the left
                newCtx.drawImage(logoImg, padding + borderWidth, padding + borderWidth, logoHeight, logoHeight);

                // Add chart title to the right of the logo
                newCtx.font = "bold 42px Arial"; // Slightly larger and bold font
                newCtx.fillStyle = "#000000";
                const titleX = padding + borderWidth + logoHeight + 30; // 15px spacing between logo and title
                const titleY = padding + borderWidth + logoHeight / 2 + 8; // Center title vertically with logo
                newCtx.fillText(chartTitle, titleX, titleY);

                // Add the chart image below the title and logo
                const chartX = padding + borderWidth;
                const chartY = padding + borderWidth + logoHeight + padding;
                newCtx.drawImage(canvas, chartX, chartY, chartWidth, chartHeight);

                // Create a link to download the image
                const link = document.createElement("a");
                link.href = newCanvas.toDataURL("image/png", 1.0); // Ensure high-quality PNG
                link.download = `${chartTitle}.png`;
                link.click();
            };
        } else {
            // Add chart title to the new canvas (centered)
            newCtx.font = "bold 42px Arial"; // Slightly larger and bold font
            newCtx.fillStyle = "#000000";
            const titleX = (totalWidth - newCtx.measureText(chartTitle).width) / 2;
            const titleY = padding + borderWidth + titleHeight;
            newCtx.fillText(chartTitle, titleX, titleY);

            // Add the chart image below the title
            const chartX = padding + borderWidth;
            const chartY = padding + borderWidth + titleHeight + padding;
            newCtx.drawImage(canvas, chartX, chartY, chartWidth, chartHeight);

            // Create a link to download the image
            const link = document.createElement("a");
            link.href = newCanvas.toDataURL("image/png", 1.0); // Ensure high-quality PNG
            link.download = `${chartTitle}.png`;
            link.click();
        }
    });
}
function exportToExcel(chartId, chartTitle) {
    // Get the table element
    const table = document.getElementById(chartId);

    if (!table) {
        alert("Table not found!");
        return;
    }

    // Convert the table to a worksheet using SheetJS
    const wb = XLSX.utils.table_to_book(table, { sheet: "Chart Data" });

    // Sanitize title for a valid filename (remove special characters and spaces)
    const safeTitle = chartTitle.replace(/[^a-zA-Z0-9]/g, "_").trim();

    // Ensure there's a valid filename
    const fileName = safeTitle ? `${safeTitle}.xlsx` : "Chart_Data.xlsx";

    // Export the workbook to an Excel file with the title as filename
    XLSX.writeFile(wb, fileName);
}



/**export all data -============================---------------------------*/
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("export-all").addEventListener("click", function () {
        const charts = [
            { id: "sales-forecast-chart", title: "Mean Scores Values" },
            { id: "basic_radar", title: "Mean Result" },
            { id: "simple_pie_chart", title: "Participants by Gender" },
            { id: "simple_pie_chart2", title: "Participants by Age" },
            { id: "sales-forecast-chart-2", title: "Positive Peace" },
            { id: "sales-forecast-chart-3", title: "Negative Peace" },
            { id: "multi_radar", title: "Results by pillars: Radar" },
            { id: "pillar-table", title: "Results by pillar: Table" }
        ];
        exportAllToPDF(charts);
    });
});

function exportAllToPDF(charts) {
    const jsPDF = window.jspdf.jsPDF;
    const pdf = new jsPDF({ orientation: "landscape" });

    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;
    let yOffset = 20;

    if (logoData) {
        pdf.addImage(logoData, "PNG", 10, 10, 30, 30);
        yOffset = 50;
    }

    const addChartToPDF = (index) => {
        if (index >= charts.length) {
            pdf.save("All_Charts.pdf");
            return;
        }

        const { id, title } = charts[index];
        const chartElement = document.getElementById(id);

        if (!chartElement) {
            addChartToPDF(index + 1);
            return;
        }

        html2canvas(chartElement).then(canvas => {
            if (index > 0) pdf.addPage();
            pdf.setFontSize(16);
            pdf.text(title, 10, yOffset);
            pdf.addImage(canvas.toDataURL("image/png"), "PNG", 10, yOffset + 10, 280, 150);
            addChartToPDF(index + 1);
        }).catch(error => {
            console.error(`Error rendering chart "${title}":`, error);
            addChartToPDF(index + 1);
        });
    };

    addChartToPDF(0);
}
