
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
                    exportToPNGMeanRadar(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            } 
            else if (chartId === "simple_pie_chart") {
                const chartTitle = document.querySelector('.pie-gender-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFPnBar(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNGPie(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            else if (chartId === "simple_pie_chart2") {
                const chartTitle = document.querySelector('.pie-age-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFPnBar(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNGPie(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            else if (chartId === "sales-forecast-chart-2") {
                const chartTitle = document.querySelector('.positive-peace-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFPnBar(chartId,chartTitle);
                }  else if (exportType === "png") {
                    exportToPNGPP(chartId,chartTitle);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            
            else if (chartId === "sales-forecast-chart-3") {
                const chartTitle = document.querySelector('.negative-peace-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFPnBar(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNGPP(chartId,chartTitle);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            } 
            else if (chartId === "multi_radar") {
                const chartTitle = document.querySelector('.results-by-pillar-radar')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFMultiRadar(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNGMultiRadar(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            else if (chartId === "pillar-table-time") {
                const chartTitle = document.querySelector('.pillar-table-time-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDF(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                } else if (exportType === "excel") {
                    exportToExcel(chartId,chartTitle);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }  else if (chartId === "pillar-table") {
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
        const margin = 5; // Margin from the edges
        const logoWidth = 100; // Width of the logo
        const logoHeight = 20; // Height of the logo
        const titleFontSize = 24;
        const titleLineHeight = 20; // Line height for the title

        // Add a black border around the content
        pdf.setDrawColor(30,30,30); // Set border color to black
        pdf.setLineWidth(0.2); // Set border thickness
        pdf.rect(margin, margin, pageWidth - 2 * margin, pageHeight - 2 * margin); // Draw border

        // Add logo to the PDF (if available)
        if (logoData) {
            pdf.addImage(logoData, "PNG", margin + 10, margin + 10, logoWidth, logoHeight); // Position logo inside the border
        }

        // Add chart title to the PDF (after the logo, centered a bit higher)
        pdf.setFontSize(titleFontSize);
        pdf.setTextColor(30,30,30); // Ensure text color is black
        // Calculate title position (below logo + spacing)
        const titleX = pdf.internal.pageSize.getWidth() / 2; // Center horizontally
        const titleY = margin + logoHeight + 35; // Below logo + extra spacing

        // Set alignment to center and add title
        pdf.text(chartTitle, titleX, titleY, { align: 'center' });


        // Calculate the position for the chart image to center it
        const chartImgWidth = pageWidth - 2 * margin - 20; // Chart width (full width minus margins and padding)
        const chartImgHeight = (chartImgWidth * canvas.height) / canvas.width; // Maintain aspect ratio
        const chartImgX = margin + 10; // Centered horizontally inside the border
        const chartImgY = titleY + titleLineHeight + 0; // Position below the title with some spacing

        // Add chart image to the PDF
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight);

         // ===== FOOTER =====
         const footerY = pageHeight - margin - 15; // Start 15mm from bottom
         const lineHeight = 5; // Space between lines
         const rightPadding = margin + 10; // Right margin
         const footerFontSize = 12;
         // Left-aligned source (grey text)
         pdf.setFontSize(footerFontSize);
         pdf.setTextColor(100, 100, 100); // Grey
         pdf.text("Source: [Positive Peace Survey 2024]", margin + 10, footerY);
         
         // Right-aligned organization (line 1)
         pdf.setTextColor(100,100,100); // Black
         const orgText = "[IEP-CSB]";
         pdf.text(orgText, pageWidth - rightPadding, footerY, { align: 'right' });
         
         // Right-aligned email (line 2)
         const emailText = "csb.economicsandpeace.org";
         pdf.text(emailText, pageWidth - rightPadding, footerY + lineHeight, { align: 'right' });


        // Save the PDF
        pdf.save(`${chartTitle}.pdf`);
    });
}

function exportToPNG(chartId, chartTitle) {
    // Capture elements
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Create canvas with dimensions matching A4 landscape at high DPI
    const pxPerMM = 5; // Higher resolution
    const canvasWidth = 297 * pxPerMM; // A4 width in mm (1485px)
    const canvasHeight = 210 * pxPerMM; // A4 height in mm (1050px)
    
    // Capture chart with higher quality
    html2canvas(document.getElementById(chartId), {
        scale: 3, // Increased scale for better quality
        useCORS: true,
        backgroundColor: null,
        logging: false
    }).then(chartCanvas => {
        // Create final composition canvas
        const finalCanvas = document.createElement("canvas");
        finalCanvas.width = canvasWidth;
        finalCanvas.height = canvasHeight;
        const ctx = finalCanvas.getContext("2d");

        // White background
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        // Design parameters (match PDF exactly)
        const margin = 5 * pxPerMM; // 5mm margin
        const contentWidth = canvasWidth - 2 * margin;
        const contentHeight = canvasHeight - 2 * margin;
        
        // Add border (match PDF style)
        ctx.strokeStyle = "#1E1E1E"; // RGB 30,30,30
        ctx.lineWidth = 1; // 1px border
        ctx.strokeRect(margin, margin, contentWidth, contentHeight);


   

        // Add logo (top left)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                const logoWidth = 100 * pxPerMM; // 100mm
                const logoHeight = 20 * pxPerMM; // 20mm
                ctx.drawImage(
                    logoImg, 
                    margin + 10, 
                    margin + 10, 
                    logoWidth, 
                    logoHeight
                );

                // Add title (match PDF styling)
                const titleFontSize = 42; // 24pt
                ctx.font = `${titleFontSize}px 'Arial'`;
                ctx.fillStyle = "#333"; // Dark gray
                ctx.textAlign = "center";
                const titleY = margin + logoHeight + 35 * pxPerMM; // 35mm below logo
                ctx.fillText(chartTitle, canvasWidth / 2, titleY);

                // Calculate chart dimensions (80% width with more spacing)
                const chartWidth = contentWidth * 0.9; // Larger than PDF's 75%
                const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
                const chartX = (canvasWidth - chartWidth) / 2;
                const chartY = titleY + 20 * pxPerMM; // Extra spacing below title

                // Add chart with shadow effect (like PDF)
                ctx.shadowColor = "rgba(0,0,0,0.1)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetY = 5;
                ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
                ctx.shadowColor = "transparent"; // Reset shadow

                // Add footer (match PDF exactly)
                const footerY = canvasHeight - margin - 15 * pxPerMM;
                const footerFontSize = 24; // 12pt
                
                // Source text (left)
                ctx.font = `${footerFontSize}px 'Arial'`;
                ctx.fillStyle = "#646464"; // Gray
                ctx.textAlign = "left";
                ctx.fillText(
                    "Source: Positive Peace Survey 2024",
                    margin + 10,
                    footerY
                );
                
                // Organization info (right)
                ctx.textAlign = "right";
                ctx.fillText(
                    "[IEP-CSB]",
                    canvasWidth - margin - 10,
                    footerY
                );
                
                ctx.fillText(
                    "csb.economicsandpeace.org",
                    canvasWidth - margin - 10,
                    footerY + 5 * pxPerMM
                );

                // Final export
                const link = document.createElement("a");
                link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
                link.href = finalCanvas.toDataURL("image/png", 1.0);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            };
        } else {
            // Fallback version without logo
            const titleFontSize = 24;
            ctx.font = `bold ${titleFontSize}px 'Arial'`;
            ctx.fillStyle = "#1E1E1E";
            ctx.textAlign = "center";
            const titleY = margin + 50 * pxPerMM;
            ctx.fillText(chartTitle, canvasWidth / 2, titleY);

            // Add larger chart (80% width)
            const chartWidth = contentWidth * 0.8;
            const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
            const chartX = (canvasWidth - chartWidth) / 2;
            const chartY = titleY + 20 * pxPerMM;
            
            // Add chart with subtle shadow
            ctx.shadowColor = "rgba(0,0,0,0.1)";
            ctx.shadowBlur = 10;
            ctx.shadowOffsetY = 5;
            ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
            ctx.shadowColor = "transparent";

            // Add footer
            const footerY = canvasHeight - margin - 15 * pxPerMM;
            ctx.font = "16px 'Arial'";
            ctx.fillStyle = "#646464";
            ctx.textAlign = "right";
            ctx.fillText(
                "[IEP-CSB]",
                canvasWidth - margin - 10,
                footerY
            );
            ctx.fillText(
                "csb.economicsandpeace.org",
                canvasWidth - margin - 10,
                footerY + 5 * pxPerMM
            );

            // Export
            const link = document.createElement("a");
            link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
            link.href = finalCanvas.toDataURL("image/png", 1.0);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }).catch(error => {
        console.error("PNG export error:", error);
        alert("Error generating image. Please try again.");
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
        backgroundColor: null // Ensures a transparent background
    }).then(canvas => {
        const chartImgData = canvas.toDataURL("image/png");

        // Initialize PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: "landscape" });

        // Define margins and dimensions
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        const margin = 5; // Margin from the edges
        const logoWidth = 100; // Width of the logo
        const logoHeight = 20; // Height of the logo
        const titleFontSize = 24;
        const titleLineHeight = 20; // Line height for the title

        // Add a black border around the content
        pdf.setDrawColor(30, 30, 30); // Set border color to black
        pdf.setLineWidth(0.2); // Set border thickness
        pdf.rect(margin, margin, pageWidth - 2 * margin, pageHeight - 2 * margin); // Draw border

        // Add logo to the PDF (if available)
        if (logoData) {
            pdf.addImage(logoData, "PNG", margin + 10, margin + 10, logoWidth, logoHeight);
        }

        // Add chart title to the PDF (centered below logo)
        pdf.setFontSize(titleFontSize);
        pdf.setTextColor(30, 30, 30); // Set text color to black
        const titleX = pdf.internal.pageSize.getWidth() / 2; // Center horizontally
        const titleY = margin + logoHeight + 35; // Below logo + extra spacing
        pdf.text(chartTitle, titleX, titleY, { align: 'center' });

        // Calculate the position for the chart image to center it
        const chartImgWidth = (pageWidth - 2 * margin) * 0.75; // 75% of available width
        const chartImgHeight = (chartImgWidth * canvas.height) / canvas.width; // Maintain aspect ratio
        const chartImgX = (pageWidth - chartImgWidth) / 2;
        const chartImgY = 25; // Position below the title with spacing

        // Add chart image to the PDF
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight);

        // ===== FOOTER =====
        const footerY = pageHeight - margin - 15; // Start 15mm from bottom
        const lineHeight = 5; // Space between lines
        const rightPadding = margin + 10; // Right margin
        const footerFontSize = 12;
        
        // Left-aligned source (grey text)
        pdf.setFontSize(footerFontSize);
        pdf.setTextColor(100, 100, 100); // Grey
        pdf.text("Source: [Positive Peace Survey 2024]", margin + 10, footerY);
        
        // Right-aligned organization (line 1)
        pdf.setTextColor(100, 100, 100); // Grey
        const orgText = "[IEP-CSB]";
        pdf.text(orgText, pageWidth - rightPadding, footerY, { align: 'right' });
        
        // Right-aligned email (line 2)
        const emailText = "csb.economicsandpeace.org";
        pdf.text(emailText, pageWidth - rightPadding, footerY + lineHeight, { align: 'right' });

        // Save the PDF
        pdf.save(`${chartTitle}.pdf`);
    });
}
//for multi radar
function exportToPDFMultiRadar(chartId, chartTitle) {
    // Capture the logo
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image
    html2canvas(document.getElementById(chartId), {
        scale: 2,
        useCORS: true,
        backgroundColor: null
    }).then(canvas => {
        const chartImgData = canvas.toDataURL("image/png");

        // Initialize PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: "landscape" });

        // Define margins and dimensions
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        const margin = 5;
        const logoWidth = 100;
        const logoHeight = 20;
        const titleFontSize = 24;
        const titleLineHeight = 20;

        // Add border
        pdf.setDrawColor(30, 30, 30);
        pdf.setLineWidth(0.2);
        pdf.rect(margin, margin, pageWidth - 2 * margin, pageHeight - 2 * margin);

        // Add logo
        if (logoData) {
            pdf.addImage(logoData, "PNG", margin + 10, margin + 10, logoWidth, logoHeight);
        }

        // Add title (centered)
        pdf.setFontSize(titleFontSize);
        pdf.setTextColor(30, 30, 30);
        const titleX = pdf.internal.pageSize.getWidth() / 2;
        const titleY = margin + logoHeight + 35; // Reduced spacing below logo
        pdf.text(chartTitle, titleX, titleY, { align: 'center' });

        // Calculate image dimensions (90% width - larger than before)
        const chartImgWidth = (pageWidth - 2 * margin) * 0.9; // Increased from 0.75 to 0.9
        const chartImgHeight = (chartImgWidth * canvas.height) / canvas.width;
        
        // Position the image lower on the page
        const chartImgX = (pageWidth - chartImgWidth) / 2;
        const chartImgY = 40;// Reduced spacing below title

        // Add chart image
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight);

        // Footer
        const footerY = pageHeight - margin - 15;
        const lineHeight = 5;
        const rightPadding = margin + 10;
        const footerFontSize = 12;
        
        pdf.setFontSize(footerFontSize);
        pdf.setTextColor(100, 100, 100);
        pdf.text("Source: [Positive Peace Survey 2024]", margin + 10, footerY);
        
        pdf.setTextColor(100, 100, 100);
        const orgText = "[IEP-CSB]";
        pdf.text(orgText, pageWidth - rightPadding, footerY, { align: 'right' });
        
        const emailText = "csb.economicsandpeace.org";
        pdf.text(emailText, pageWidth - rightPadding, footerY + lineHeight, { align: 'right' });

        // Save PDF
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
        const margin = 5; // Reduced margin for more content space
        const logoWidth = 100; // Larger logo like other functions
        const logoHeight = 20;
        const titleFontSize = 24; // Larger title font
        const titleLineHeight = 20;

        // Add a black border around the content (consistent styling)
        pdf.setDrawColor(30, 30, 30); // Dark gray border
        pdf.setLineWidth(0.2); // Thinner border
        pdf.rect(margin, margin, pageWidth - 2 * margin, pageHeight - 2 * margin);

        // Add logo (if available)
        if (logoData) {
            pdf.addImage(logoData, "PNG", margin + 10, margin + 10, logoWidth, logoHeight);
        }

        // Add title (centered like other functions)
        pdf.setFontSize(titleFontSize);
        pdf.setTextColor(30, 30, 30); // Dark gray text
        const titleX = pdf.internal.pageSize.getWidth() / 2;
        const titleY = margin + logoHeight + 35; // Consistent spacing below logo
        pdf.text(chartTitle, titleX, titleY, { align: 'center' });

        // Calculate the image dimensions (75% width like other functions)
        const chartImgWidth = (pageWidth - 2 * margin) * 0.5; // Reduced to 60% width
        const chartImgHeight = (chartImgWidth * canvas.height) / canvas.width;
        
        // Center the image horizontally
        const chartImgX = (pageWidth - chartImgWidth) / 2;
        // Position below title with consistent spacing
        const chartImgY = titleY + titleLineHeight;

        // Add the chart image
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight);

        // ===== FOOTER (consistent with other functions) =====
        const footerY = pageHeight - margin - 15;
        const lineHeight = 5;
        const rightPadding = margin + 10;
        const footerFontSize = 12;
        
        // Left-aligned source
        pdf.setFontSize(footerFontSize);
        pdf.setTextColor(100, 100, 100); // Gray text
        pdf.text("Source: [Positive Peace Survey 2024]", margin + 10, footerY);
        
        // Right-aligned organization info
        pdf.setTextColor(100, 100, 100);
        const orgText = "[IEP-CSB]";
        pdf.text(orgText, pageWidth - rightPadding, footerY, { align: 'right' });
        
        const emailText = "csb.economicsandpeace.org";
        pdf.text(emailText, pageWidth - rightPadding, footerY + lineHeight, { align: 'right' });

        // Save the PDF
        pdf.save(`${chartTitle}.pdf`);
    });
}

//for mean radar png
function exportToPNGMeanRadar(chartId, chartTitle) {
    // Capture elements
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Create canvas with dimensions matching A4 landscape at high DPI
    const pxPerMM = 5; // Higher resolution
    const canvasWidth = 297 * pxPerMM; // A4 width in mm (1485px)
    const canvasHeight = 210 * pxPerMM; // A4 height in mm (1050px)
    
    // Capture chart with higher quality
    html2canvas(document.getElementById(chartId), {
        scale: 3, // Increased scale for better quality
        useCORS: true,
        backgroundColor: null,
        logging: false
    }).then(chartCanvas => {
        // Create final composition canvas
        const finalCanvas = document.createElement("canvas");
        finalCanvas.width = canvasWidth;
        finalCanvas.height = canvasHeight;
        const ctx = finalCanvas.getContext("2d");

        // White background
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        // Design parameters (match PDF exactly)
        const margin = 5 * pxPerMM; // 5mm margin
        const contentWidth = canvasWidth - 2 * margin;
        const contentHeight = canvasHeight - 2 * margin;
        
        // Add border (match PDF style)
        ctx.strokeStyle = "#1E1E1E"; // RGB 30,30,30
        ctx.lineWidth = 1; // 1px border
        ctx.strokeRect(margin, margin, contentWidth, contentHeight);


   

        // Add logo (top left)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                const logoWidth = 100 * pxPerMM; // 100mm
                const logoHeight = 20 * pxPerMM; // 20mm
                ctx.drawImage(
                    logoImg, 
                    margin + 10, 
                    margin + 10, 
                    logoWidth, 
                    logoHeight
                );

                // Add title (match PDF styling)
                const titleFontSize = 42; // 24pt
                ctx.font = `${titleFontSize}px 'Arial'`;
                ctx.fillStyle = "#333"; // Dark gray
                ctx.textAlign = "center";
                const titleY = margin + logoHeight + 20 * pxPerMM; // 35mm below logo
                ctx.fillText(chartTitle, canvasWidth / 2, titleY);

                // Calculate chart dimensions (80% width with more spacing)
                const chartWidth = contentWidth * 0.9; // Larger than PDF's 75%
                const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
                const chartX = (canvasWidth - chartWidth) / 2;
                const chartY = 30; // Extra spacing below title

                // Add chart with shadow effect (like PDF)
                ctx.shadowColor = "rgba(0,0,0,0.1)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetY = 5;
                ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
                ctx.shadowColor = "transparent"; // Reset shadow

                // Add footer (match PDF exactly)
                const footerY = canvasHeight - margin - 15 * pxPerMM;
                const footerFontSize = 24; // 12pt
                
                // Source text (left)
                ctx.font = `${footerFontSize}px 'Arial'`;
                ctx.fillStyle = "#646464"; // Gray
                ctx.textAlign = "left";
                ctx.fillText(
                    "Source: Positive Peace Survey 2024",
                    margin + 10,
                    footerY
                );
                
                // Organization info (right)
                ctx.textAlign = "right";
                ctx.fillText(
                    "[IEP-CSB]",
                    canvasWidth - margin - 10,
                    footerY
                );
                
                ctx.fillText(
                    "csb.economicsandpeace.org",
                    canvasWidth - margin - 10,
                    footerY + 5 * pxPerMM
                );

                // Final export
                const link = document.createElement("a");
                link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
                link.href = finalCanvas.toDataURL("image/png", 1.0);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            };
        } else {
            // Fallback version without logo
            const titleFontSize = 24;
            ctx.font = `bold ${titleFontSize}px 'Arial'`;
            ctx.fillStyle = "#1E1E1E";
            ctx.textAlign = "center";
            const titleY = margin + 50 * pxPerMM;
            ctx.fillText(chartTitle, canvasWidth / 2, titleY);

            // Add larger chart (80% width)
            const chartWidth = contentWidth * 0.8;
            const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
            const chartX = (canvasWidth - chartWidth) / 2;
            const chartY = titleY + 20 * pxPerMM;
            
            // Add chart with subtle shadow
            ctx.shadowColor = "rgba(0,0,0,0.1)";
            ctx.shadowBlur = 10;
            ctx.shadowOffsetY = 5;
            ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
            ctx.shadowColor = "transparent";

            // Add footer
            const footerY = canvasHeight - margin - 15 * pxPerMM;
            ctx.font = "16px 'Arial'";
            ctx.fillStyle = "#646464";
            ctx.textAlign = "right";
            ctx.fillText(
                "[IEP-CSB]",
                canvasWidth - margin - 10,
                footerY
            );
            ctx.fillText(
                "csb.economicsandpeace.org",
                canvasWidth - margin - 10,
                footerY + 5 * pxPerMM
            );

            // Export
            const link = document.createElement("a");
            link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
            link.href = finalCanvas.toDataURL("image/png", 1.0);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }).catch(error => {
        console.error("PNG export error:", error);
        alert("Error generating image. Please try again.");
    });
}
//piechart png download
function exportToPNGPie(chartId, chartTitle) {
    // Capture elements
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Create canvas with dimensions matching A4 landscape at high DPI
    const pxPerMM = 5; // Higher resolution
    const canvasWidth = 297 * pxPerMM; // A4 width in mm (1485px)
    const canvasHeight = 210 * pxPerMM; // A4 height in mm (1050px)
    
    // Capture chart with higher quality
    html2canvas(document.getElementById(chartId), {
        scale: 3, // Increased scale for better quality
        useCORS: true,
        backgroundColor: null,
        logging: false
    }).then(chartCanvas => {
        // Create final composition canvas
        const finalCanvas = document.createElement("canvas");
        finalCanvas.width = canvasWidth;
        finalCanvas.height = canvasHeight;
        const ctx = finalCanvas.getContext("2d");

        // White background
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        // Design parameters (match PDF exactly)
        const margin = 5 * pxPerMM; // 5mm margin
        const contentWidth = canvasWidth - 2 * margin;
        const contentHeight = canvasHeight - 2 * margin;
        
        // Add border (match PDF style)
        ctx.strokeStyle = "#1E1E1E"; // RGB 30,30,30
        ctx.lineWidth = 1; // 1px border
        ctx.strokeRect(margin, margin, contentWidth, contentHeight);

        // Add logo (top left)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                const logoWidth = 100 * pxPerMM; // 100mm
                const logoHeight = 20 * pxPerMM; // 20mm
                ctx.drawImage(
                    logoImg, 
                    margin + 10, 
                    margin + 10, 
                    logoWidth, 
                    logoHeight
                );

                // Add title (match PDF styling)
                const titleFontSize = 42; // 24pt
                ctx.font = `${titleFontSize}px 'Arial'`;
                ctx.fillStyle = "#333"; // Dark gray
                ctx.textAlign = "center";
                const titleY = margin + logoHeight + 35 * pxPerMM; // 35mm below logo
                ctx.fillText(chartTitle, canvasWidth / 2, titleY);

                // Calculate chart dimensions maintaining original aspect ratio
                const maxChartWidth = contentWidth * 0.7;
                const maxChartHeight = contentHeight * 0.5;
                
                // Calculate dimensions that fit within bounds while maintaining aspect ratio
                const chartAspectRatio = chartCanvas.width / chartCanvas.height;
                let chartWidth = maxChartWidth;
                let chartHeight = chartWidth / chartAspectRatio;
                
                if (chartHeight > maxChartHeight) {
                    chartHeight = maxChartHeight;
                    chartWidth = chartHeight * chartAspectRatio;
                }

                const chartX = (canvasWidth - chartWidth) / 2;
                const chartY = titleY + 20 * pxPerMM; // Extra spacing below title

                // Add chart with shadow effect (like PDF)
                ctx.shadowColor = "rgba(0,0,0,0.1)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetY = 5;
                ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
                ctx.shadowColor = "transparent"; // Reset shadow

                // Add footer (match PDF exactly)
                const footerY = canvasHeight - margin - 15 * pxPerMM;
                const footerFontSize = 24; // 12pt
                
                // Source text (left)
                ctx.font = `${footerFontSize}px 'Arial'`;
                ctx.fillStyle = "#646464"; // Gray
                ctx.textAlign = "left";
                ctx.fillText(
                    "Source: Positive Peace Survey 2024",
                    margin + 10,
                    footerY
                );
                
                // Organization info (right)
                ctx.textAlign = "right";
                ctx.fillText(
                    "[IEP-CSB]",
                    canvasWidth - margin - 10,
                    footerY
                );
                
                ctx.fillText(
                    "csb.economicsandpeace.org",
                    canvasWidth - margin - 10,
                    footerY + 5 * pxPerMM
                );

                // Final export
                const link = document.createElement("a");
                link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
                link.href = finalCanvas.toDataURL("image/png", 1.0);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            };
        } else {
            // Fallback version without logo
            const titleFontSize = 42;
            ctx.font = `${titleFontSize}px 'Arial'`;
            ctx.fillStyle = "#333";
            ctx.textAlign = "center";
            const titleY = margin + 50 * pxPerMM;
            ctx.fillText(chartTitle, canvasWidth / 2, titleY);

            // Calculate chart dimensions maintaining original aspect ratio
            const maxChartWidth = contentWidth * 0.9;
            const maxChartHeight = contentHeight * 0.6;
            
            const chartAspectRatio = chartCanvas.width / chartCanvas.height;
            let chartWidth = maxChartWidth;
            let chartHeight = chartWidth / chartAspectRatio;
            
            if (chartHeight > maxChartHeight) {
                chartHeight = maxChartHeight;
                chartWidth = chartHeight * chartAspectRatio;
            }

            const chartX = (canvasWidth - chartWidth) / 2;
            const chartY = titleY + 20 * pxPerMM;
            
            // Add chart with subtle shadow
            ctx.shadowColor = "rgba(0,0,0,0.1)";
            ctx.shadowBlur = 10;
            ctx.shadowOffsetY = 5;
            ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
            ctx.shadowColor = "transparent";

            // Add footer
            const footerY = canvasHeight - margin - 15 * pxPerMM;
            ctx.font = "24px 'Arial'";
            ctx.fillStyle = "#646464";
            ctx.textAlign = "right";
            ctx.fillText(
                "[IEP-CSB]",
                canvasWidth - margin - 10,
                footerY
            );
            ctx.fillText(
                "csb.economicsandpeace.org",
                canvasWidth - margin - 10,
                footerY + 5 * pxPerMM
            );

            // Export
            const link = document.createElement("a");
            link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
            link.href = finalCanvas.toDataURL("image/png", 1.0);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }).catch(error => {
        console.error("PNG export error:", error);
        alert("Error generating image. Please try again.");
    });
}

//png multi radar
function exportToPNGMultiRadar(chartId, chartTitle) {
    // Capture elements
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Create canvas with dimensions matching A4 landscape at high DPI
    const pxPerMM = 5; // Higher resolution
    const canvasWidth = 297 * pxPerMM; // A4 width in mm (1485px)
    const canvasHeight = 210 * pxPerMM; // A4 height in mm (1050px)
    
    // Capture chart with higher quality
    html2canvas(document.getElementById(chartId), {
        scale: 3, // Increased scale for better quality
        useCORS: true,
        backgroundColor: null,
        logging: false
    }).then(chartCanvas => {
        // Create final composition canvas
        const finalCanvas = document.createElement("canvas");
        finalCanvas.width = canvasWidth;
        finalCanvas.height = canvasHeight;
        const ctx = finalCanvas.getContext("2d");

        // White background
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        // Design parameters (match PDF exactly)
        const margin = 5 * pxPerMM; // 5mm margin
        const contentWidth = canvasWidth - 2 * margin;
        const contentHeight = canvasHeight - 2 * margin;
        
        // Add border (match PDF style)
        ctx.strokeStyle = "#1E1E1E"; // RGB 30,30,30
        ctx.lineWidth = 1; // 1px border
        ctx.strokeRect(margin, margin, contentWidth, contentHeight);


   

        // Add logo (top left)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                const logoWidth = 100 * pxPerMM; // 100mm
                const logoHeight = 20 * pxPerMM; // 20mm
                ctx.drawImage(
                    logoImg, 
                    margin + 10, 
                    margin + 10, 
                    logoWidth, 
                    logoHeight
                );

                // Add title (match PDF styling)
                const titleFontSize = 42; // 24pt
                ctx.font = `${titleFontSize}px 'Arial'`;
                ctx.fillStyle = "#333"; // Dark gray
                ctx.textAlign = "center";
                const titleY = margin + logoHeight + 20 * pxPerMM; // 35mm below logo
                ctx.fillText(chartTitle, canvasWidth / 2, titleY);

                // Calculate chart dimensions (80% width with more spacing)
                const chartWidth = contentWidth * 1; // Larger than PDF's 75%
                const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
                const chartX = (canvasWidth - chartWidth) / 2;
                const chartY = 100; // Extra spacing below title

                // Add chart with shadow effect (like PDF)
                ctx.shadowColor = "rgba(0,0,0,0.1)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetY = 5;
                ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
                ctx.shadowColor = "transparent"; // Reset shadow

                // Add footer (match PDF exactly)
                const footerY = canvasHeight - margin - 15 * pxPerMM;
                const footerFontSize = 24; // 12pt
                
                // Source text (left)
                ctx.font = `${footerFontSize}px 'Arial'`;
                ctx.fillStyle = "#646464"; // Gray
                ctx.textAlign = "left";
                ctx.fillText(
                    "Source: Positive Peace Survey 2024",
                    margin + 10,
                    footerY
                );
                
                // Organization info (right)
                ctx.textAlign = "right";
                ctx.fillText(
                    "[IEP-CSB]",
                    canvasWidth - margin - 10,
                    footerY
                );
                
                ctx.fillText(
                    "csb.economicsandpeace.org",
                    canvasWidth - margin - 10,
                    footerY + 5 * pxPerMM
                );

                // Final export
                const link = document.createElement("a");
                link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
                link.href = finalCanvas.toDataURL("image/png", 1.0);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            };
        } else {
            // Fallback version without logo
            const titleFontSize = 24;
            ctx.font = `bold ${titleFontSize}px 'Arial'`;
            ctx.fillStyle = "#1E1E1E";
            ctx.textAlign = "center";
            const titleY = margin + 50 * pxPerMM;
            ctx.fillText(chartTitle, canvasWidth / 2, titleY);

            // Add larger chart (80% width)
            const chartWidth = contentWidth * 0.8;
            const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
            const chartX = (canvasWidth - chartWidth) / 2;
            const chartY = titleY + 20 * pxPerMM;
            
            // Add chart with subtle shadow
            ctx.shadowColor = "rgba(0,0,0,0.1)";
            ctx.shadowBlur = 10;
            ctx.shadowOffsetY = 5;
            ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
            ctx.shadowColor = "transparent";

            // Add footer
            const footerY = canvasHeight - margin - 15 * pxPerMM;
            ctx.font = "16px 'Arial'";
            ctx.fillStyle = "#646464";
            ctx.textAlign = "right";
            ctx.fillText(
                "[IEP-CSB]",
                canvasWidth - margin - 10,
                footerY
            );
            ctx.fillText(
                "csb.economicsandpeace.org",
                canvasWidth - margin - 10,
                footerY + 5 * pxPerMM
            );

            // Export
            const link = document.createElement("a");
            link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
            link.href = finalCanvas.toDataURL("image/png", 1.0);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }).catch(error => {
        console.error("PNG export error:", error);
        alert("Error generating image. Please try again.");
    });
}

//png pp
function exportToPNGPP(chartId, chartTitle) {
    // Capture elements
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Create canvas with dimensions matching A4 landscape at high DPI
    const pxPerMM = 5; // Higher resolution
    const canvasWidth = 297 * pxPerMM; // A4 width in mm (1485px)
    const canvasHeight = 210 * pxPerMM; // A4 height in mm (1050px)
    
    // Capture chart with higher quality
    html2canvas(document.getElementById(chartId), {
        scale: 3, // Increased scale for better quality
        useCORS: true,
        backgroundColor: null,
        logging: false
    }).then(chartCanvas => {
        // Create final composition canvas
        const finalCanvas = document.createElement("canvas");
        finalCanvas.width = canvasWidth;
        finalCanvas.height = canvasHeight;
        const ctx = finalCanvas.getContext("2d");

        // White background
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        // Design parameters (match PDF exactly)
        const margin = 5 * pxPerMM; // 5mm margin
        const contentWidth = canvasWidth - 2 * margin;
        const contentHeight = canvasHeight - 2 * margin;
        
        // Add border (match PDF style)
        ctx.strokeStyle = "#1E1E1E"; // RGB 30,30,30
        ctx.lineWidth = 1; // 1px border
        ctx.strokeRect(margin, margin, contentWidth, contentHeight);


   

        // Add logo (top left)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                const logoWidth = 100 * pxPerMM; // 100mm
                const logoHeight = 20 * pxPerMM; // 20mm
                ctx.drawImage(
                    logoImg, 
                    margin + 10, 
                    margin + 10, 
                    logoWidth, 
                    logoHeight
                );

                // Add title (match PDF styling)
                const titleFontSize = 42; // 24pt
                ctx.font = `${titleFontSize}px 'Arial'`;
                ctx.fillStyle = "#333"; // Dark gray
                ctx.textAlign = "center";
                const titleY = margin + logoHeight + 35 * pxPerMM; // 35mm below logo
                ctx.fillText(chartTitle, canvasWidth / 2, titleY);

                // Calculate chart dimensions (80% width with more spacing)
                const chartWidth = contentWidth * 0.5; // Larger than PDF's 75%
                const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
                const chartX = (canvasWidth - chartWidth) / 2;
                const chartY = titleY + 20 * pxPerMM; // Extra spacing below title

                // Add chart with shadow effect (like PDF)
                ctx.shadowColor = "rgba(0,0,0,0.1)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetY = 5;
                ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
                ctx.shadowColor = "transparent"; // Reset shadow

                // Add footer (match PDF exactly)
                const footerY = canvasHeight - margin - 15 * pxPerMM;
                const footerFontSize = 24; // 12pt
                
                // Source text (left)
                ctx.font = `${footerFontSize}px 'Arial'`;
                ctx.fillStyle = "#646464"; // Gray
                ctx.textAlign = "left";
                ctx.fillText(
                    "Source: Positive Peace Survey 2024",
                    margin + 10,
                    footerY
                );
                
                // Organization info (right)
                ctx.textAlign = "right";
                ctx.fillText(
                    "[IEP-CSB]",
                    canvasWidth - margin - 10,
                    footerY
                );
                
                ctx.fillText(
                    "csb.economicsandpeace.org",
                    canvasWidth - margin - 10,
                    footerY + 5 * pxPerMM
                );

                // Final export
                const link = document.createElement("a");
                link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
                link.href = finalCanvas.toDataURL("image/png", 1.0);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            };
        } else {
            // Fallback version without logo
            const titleFontSize = 24;
            ctx.font = `bold ${titleFontSize}px 'Arial'`;
            ctx.fillStyle = "#1E1E1E";
            ctx.textAlign = "center";
            const titleY = margin + 50 * pxPerMM;
            ctx.fillText(chartTitle, canvasWidth / 2, titleY);

            // Add larger chart (80% width)
            const chartWidth = contentWidth * 0.4;
            const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
            const chartX = (canvasWidth - chartWidth) / 2;
            const chartY = titleY + 20 * pxPerMM;
            
            // Add chart with subtle shadow
            ctx.shadowColor = "rgba(0,0,0,0.1)";
            ctx.shadowBlur = 10;
            ctx.shadowOffsetY = 5;
            ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
            ctx.shadowColor = "transparent";

            // Add footer
            const footerY = canvasHeight - margin - 15 * pxPerMM;
            ctx.font = "16px 'Arial'";
            ctx.fillStyle = "#646464";
            ctx.textAlign = "right";
            ctx.fillText(
                "[IEP-CSB]",
                canvasWidth - margin - 10,
                footerY
            );
            ctx.fillText(
                "csb.economicsandpeace.org",
                canvasWidth - margin - 10,
                footerY + 5 * pxPerMM
            );

            // Export
            const link = document.createElement("a");
            link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
            link.href = finalCanvas.toDataURL("image/png", 1.0);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }).catch(error => {
        console.error("PNG export error:", error);
        alert("Error generating image. Please try again.");
    });
}

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


