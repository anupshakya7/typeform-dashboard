document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("export-all").addEventListener("click", function () {
        document.getElementById("export-all").disabled = true;
        const selectedCountry = document.getElementById('country').value;
        const selectedOrganization = document.getElementById('organization').value;
        document.getElementById("survey-table").style.display = "block";

        $.ajax({
            url: '/typeform/fecthallsurvey', 
            type: 'GET',
            data: {
                country: selectedCountry,  // Send the selected country
                organization_id: selectedOrganization  // Send the selected organization ID
            },
            dataType: 'json',
            success: function (response) {                // Assuming 'response' contains the data needed to populate the charts and tables
                const surveyData = response.surveys; // Adjust according to the data structure

                // Update DOM elements with fetched data (you should have chart render logic here)
                updateTable(surveyData);

                // Once data is fetched and DOM updated, enable the export functionality
                document.getElementById("export-all").disabled = false; // Enable export button

                // Now trigger the export functionality
                const charts = [
                    { id: "sales-forecast-chart", title: "Mean Scores Values" },
                    { id: "basic_radar_chart", title: "Mean Result" },
                    { id: "simple_pie_chart", title: "Participants by Gender" },
                    { id: "simple_pie_chart2", title: "Participants by Age" },
                    { id: "sales-forecast-chart-2", title: "Positive Peace" },
                    { id: "sales-forecast-chart-3", title: "Negative Peace" },
                    { id: "multi_radar", title: "Results by pillars: Radar" },
                    { id: "pillar-table", title: "Results by pillar: Table" },
                    { id: "survey-table", title: "Survey Report: Table" }

                ];
                // Call the export function to generate PNG and PDF
                exportChartsToPNGAndPDF(charts, function () {
                    surveyTable.style.display = "none"; // Hide table after export is complete
                });

            },
            error: function (error) {
                console.log('Error fetching data:', error);
                document.getElementById("export-all").disabled = false;
                surveyTable.style.display = "none"; // Hide table on error
            }
        });
    });
});

function updateTable(data) {
    const tableBody = document.getElementById("survey-table").getElementsByTagName("tbody")[0];
    tableBody.innerHTML = "";  // Clear existing table rows

    // Populate the table with fetched data
    data.forEach(function (item) {
        const row = tableBody.insertRow();

        // Assuming the response data contains the correct properties
        row.insertCell(0).textContent = item.survey_data_id || 'N/A';
        row.insertCell(1).textContent = item.survey_id || 'N/A';
        row.insertCell(2).textContent = item.survey_name || 'N/A';
        row.insertCell(3).textContent = item.survey_country || 'N/A';
        row.insertCell(4).textContent = item.survey_organization || 'N/A';
        row.insertCell(5).textContent = item.participant_name || 'N/A';
        row.insertCell(6).textContent = item.age || 'N/A';
        row.insertCell(7).textContent = item.gender || 'N/A';
        row.insertCell(8).textContent = item.survey_date || 'N/A';
    });
}

function exportChartsToPNGAndPDF(charts) {
    const jsPDF = window.jspdf.jsPDF;
    const pdf = new jsPDF({ orientation: "portrait" });
    let yOffset = 10;  // Padding at the top
    let xOffset = 25;  // Padding on the left
    const exportedImages = [];

    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Add logo and title ("Community Strength Barometer") on the same line
    if (logoData) {
        pdf.addImage(logoData, "PNG", xOffset, yOffset, 20, 20); // Logo size
        const pdfWidth = pdf.internal.pageSize.width; // Page width
        const titleText = "Community Strength Barometer: Report";
        const titleWidth = pdf.getTextWidth(titleText); // Width of the title text
        const titleXPosition = xOffset + 25; // Position the title next to the logo
        pdf.setFontSize(14);
        pdf.text(titleText, titleXPosition, yOffset + 15); // Align text next to the logo
    }

    // Add a light grey border after the logo and title
    const titleYPosition = yOffset + 25; // Slightly move down after title
    const pdfWidth = pdf.internal.pageSize.width;
    pdf.setLineWidth(0.5); // Border thickness
    pdf.setDrawColor(211, 211, 211); // Light grey color
    pdf.line(xOffset, titleYPosition, pdfWidth - xOffset, titleYPosition); // Draw the border

    // Add some padding below the border before the first chart
    yOffset = titleYPosition + 20; // Increased space after the top border

    const captureChart = (index) => {
        if (index >= charts.length) {
            generatePDF(exportedImages);
            return;
        }

        const { id, title } = charts[index];
        const chartElement = document.getElementById(id);

        if (!chartElement) {
            captureChart(index + 1);
            return;
        }

        html2canvas(chartElement).then(canvas => {
            exportedImages.push({ title, imgData: canvas.toDataURL("image/png"), width: canvas.width, height: canvas.height });
            captureChart(index + 1);
        }).catch(error => {
            console.error(`Error rendering chart "${title}":`, error);
            captureChart(index + 1);
        });
    };

    const generatePDF = (images) => {
        let imageCount = 0;
        images.forEach((image, i) => {
            if (imageCount % 2 === 0 && i > 0) pdf.addPage();
            pdf.setFontSize(12);
            const imgWidth = 130;
            const aspectRatio = image.width / image.height;
            const imgHeight = imgWidth / aspectRatio;
            const yPosition = yOffset + (imageCount % 2 === 0 ? 0 : imgHeight + 20); // Adjust spacing between images
            pdf.text(image.title, xOffset, yPosition - 5);

            // Add 1px light grey border around each image
            const borderMargin = 1;
            pdf.setFillColor(211, 211, 211); // Light grey color
            pdf.setLineWidth(0.5); // Set border line thickness to 1px
            pdf.rect(xOffset - borderMargin, yPosition - borderMargin, imgWidth + 2 * borderMargin, imgHeight + 2 * borderMargin); // Draw the border

            pdf.addImage(image.imgData, "PNG", xOffset, yPosition, imgWidth, imgHeight);
            imageCount++;
        });
        pdf.save("CSB_Report.pdf");
    };

    captureChart(0);

}


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

                    exportToPDFMeanRadar(chartId,chartTitle);
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

                    exportToPDFPnBar(chartId,chartTitle);
                }  else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            
            else if (chartId === "sales-forecast-chart-3") {
                const chartTitle = document.querySelector('.negative-peace-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFPnBar(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            } 
            else if (chartId === "multi_radar") {
                const chartTitle = document.querySelector('.results-by-pillar-radar')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFMultiRadar(chartId,chartTitle);
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
    backgroundColor: null
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
        backgroundColor: null
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

//for mean radar
function exportToPDFMeanRadar(chartId, chartTitle) {
    // Capture the logo (assuming the logo is an img element with a specific class or ID)
    const logo = document.querySelector(".logo img"); // Adjust the selector to match your logo element
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image
    html2canvas(document.getElementById(chartId), {
        scale: 2, // Increase scale for higher resolution
    useCORS: true, // Enable CORS if images are from external sources
    backgroundColor: null // Ensures a transparent background
    }).then(canvas => {
        const chartImgData = canvas.toDataURL("image/png");

        // Initialize PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: "landscape" });

        // Define margins and dimensions
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        const margin = 20; // Margin from the edges
        const logoWidth = 20; // Width of the logo
        const logoHeight = 20; // Height of the logo
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
        const titleY = 43; // Move title a bit higher (adjust as needed)
        pdf.text(chartTitle, titleX, titleY);

        // Calculate the position for the chart image to center it
        const chartImgWidth = pageWidth - 2 * margin - 20; // Chart width (full width minus margins and padding)
        const chartImgHeight = (chartImgWidth * canvas.height) / canvas.width; // Maintain aspect ratio
        // const chartImgX = margin + 10; // Centered horizontally inside the border
        // const chartImgY = titleY + titleLineHeight + 0; // Position below the title with some spacing
        const chartImgX = margin + 10; // Set custom X position
        const chartImgY = 10; // Set custom Y position
        
        // Add chart image to the PDF
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight);

        // Save the PDF
        pdf.save(`${chartTitle}.pdf`);
    });
}
//for multi radar
function exportToPDFMultiRadar(chartId, chartTitle) {
    // Capture the logo (assuming the logo is an img element with a specific class or ID)
    const logo = document.querySelector(".logo img"); // Adjust the selector to match your logo element
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image
    html2canvas(document.getElementById(chartId), {
        scale: 2, // Increase scale for higher resolution
    useCORS: true, // Enable CORS if images are from external sources
    backgroundColor: null // Ensures a transparent background
    }).then(canvas => {
        const chartImgData = canvas.toDataURL("image/png");

        // Initialize PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: "landscape" });

        // Define margins and dimensions
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        const margin = 20; // Margin from the edges
        const logoWidth = 20; // Width of the logo
        const logoHeight = 20; // Height of the logo
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
        const titleY = 43; // Move title a bit higher (adjust as needed)
        pdf.text(chartTitle, titleX, titleY);

        // Calculate the position for the chart image to center it
        const chartImgWidth = pageWidth - 2 * margin - 20; // Chart width (full width minus margins and padding)
        const chartImgHeight = (chartImgWidth * canvas.height) / canvas.width; // Maintain aspect ratio
        // const chartImgX = margin + 10; // Centered horizontally inside the border
        // const chartImgY = titleY + titleLineHeight + 0; // Position below the title with some spacing
        const chartImgX = margin + 10; // Set custom X position
        const chartImgY = 30; // Set custom Y position
        
        // Add chart image to the PDF
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight);

        // Save the PDF
        pdf.save(`${chartTitle}.pdf`);
    });
}


//for positive and negative peace
function exportToPDFPnBar(chartId, chartTitle) {
    // Capture the logo
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image
    html2canvas(document.getElementById(chartId), {
        scale: 2, // High resolution
        useCORS: true,
        backgroundColor: null // Ensure transparency
    }).then(canvas => {
        const chartImgData = canvas.toDataURL("image/png");

        // Initialize PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: "landscape" });

        // Define margins and dimensions
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        const margin = 20; // Margin from the edges
        const logoWidth = 20;
        const logoHeight = 20;
        const titleFontSize = 16;
        const titleLineHeight = 20;

        // Add a black border around the content
        pdf.setDrawColor(0);
        pdf.setLineWidth(1);
        pdf.rect(margin, margin, pageWidth - 2 * margin, pageHeight - 2 * margin);

        // Add logo (if available)
        if (logoData) {
            pdf.addImage(logoData, "PNG", margin + 10, margin + 10, logoWidth, logoHeight);
        }

        // Add title
        pdf.setFontSize(titleFontSize);
        pdf.setTextColor(0);
        const titleX = margin + logoWidth + 20;
        const titleY = margin + 23;
        pdf.text(chartTitle, titleX, titleY);

        // Calculate the image size to fit within the border
        const maxChartWidth = pageWidth - 2 * margin - 40; // Reduce width to fit within the border
        const maxChartHeight = pageHeight - titleY - titleLineHeight - margin - 30; // Reduce height to fit

        // Maintain aspect ratio
        let chartImgWidth = maxChartWidth;
        let chartImgHeight = (canvas.height / canvas.width) * chartImgWidth;

        if (chartImgHeight > maxChartHeight) {
            chartImgHeight = maxChartHeight;
            chartImgWidth = (canvas.width / canvas.height) * chartImgHeight;
        }

        // Center the image inside the border
        const chartImgX = margin + ((pageWidth - 2 * margin - chartImgWidth) / 2);
        const chartImgY = titleY + titleLineHeight + 10; // Add spacing below the title

        // Add the chart image
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight, '', 'FAST');

        // Save the PDF
        pdf.save(`${chartTitle}.pdf`);
    });
}


//survey begin js
