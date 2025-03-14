/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.comom
File: Radar Chart init js
*/

// get colors array from the string
function getChartColorsArray(chartId) {
    if (document.getElementById(chartId) !== null) {
        const colorAttr = "data-colors" + ("-" + document.documentElement.getAttribute("data-theme") ?? "");
        var colors = document.getElementById(chartId).getAttribute(colorAttr) ?? document.getElementById(chartId).getAttribute("data-colors");
        if (colors) {
            colors = JSON.parse(colors);
            return colors.map(function (value) {
                var newValue = value.replace(" ", "");
                if (newValue.indexOf(",") === -1) {
                    var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                    if (color) return color;
                    else return newValue;;
                } else {
                    var val = value.split(',');
                    if (val.length == 2) {
                        var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
                        rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                        return rgbaColor;
                    } else {
                        return newValue;
                    }
                }
            });
        } else {
            console.warn('data-colors attributes not found on', chartId);
        }
    }
}

// Basic Radar Chart
// var chartRadarBasicColors = getChartColorsArray("basic_radar");
// if (chartRadarBasicColors) {
//     var options = {
//         series: [
//             {
//                 name: 'Mean',
//                 data: [80, 50, 30, 40, 100, 20, 40, 60],
//             }
//         ],
//         chart: {
//             height: 500,
//             type: 'radar',
//             toolbar: {
//                 show: false
//             }
//         },
//         colors: chartRadarBasicColors,
//         xaxis: {
//             categories: [
//                 'Well-functioning Government', 
//                 'Low Levels Of Corruption', 
//                 'Equitable Distribution Of Resources', 
//                 'Good Relations With Neighbors', 
//                 'Free Flow Of Information', 
//                 'High Levels Of Human Capital', 
//                 'Sound Business Environment',
//                 'Acceptance Of The Rights Of Others'
//             ]
//         },
//         tooltip: {
//             enabled: true,
//             shared: false, // Set to false to ensure visibility
//             followCursor: true, // Follows the mouse for better positioning
//             theme: 'dark', // Ensures the tooltip is visible
//             y: {
//                 formatter: function (val) {
//                     return val.toFixed(2) + " points";
//                 }
//             }
//         },
//         stroke: {
//             width: 2 // Increases line thickness to improve interaction
//         },
//         fill: {
//             opacity: 0.2 // Ensures data is visible while keeping tooltip accessible
//         },
//         markers: {
//             size: 5, // Makes data points larger for better hover detection
//             hover: {
//                 size: 8 // Ensures tooltip appears when hovering over points
//             }
//         }
//     };

//     var chart = new ApexCharts(document.querySelector("#basic_radar"), options);
//     chart.render();
// }

// Radar Chart - Multi series
// var chartRadarMultiColors = getChartColorsArray("multi_radar");
// if (chartRadarMultiColors) {
//     var options = {
//         series: [
//             {
//                 name: 'Mean',
//                 data: [80, 50, 30, 40, 100, 20, 60, 70],
//             },
//             {
//                 name: 'Country Mean',
//                 data: [20, 30, 40, 80, 20, 80, 50, 90],
//             },
//             {
//                 name: 'Global Mean',
//                 data: [44, 76, 78, 13, 43, 10, 55, 85],
//             }
//         ],
//         chart: {
//             height: 600,
//             type: 'radar',
//             dropShadow: {
//                 enabled: true,
//                 blur: 1,
//                 left: 1,
//                 top: 1
//             },
//             toolbar: {
//                 show: false
//             },
//         },
//         stroke: {
//             width: 2
//         },
//         fill: {
//             opacity: 0.2
//         },
//         markers: {
//             size: 4
//         },
//         colors: chartRadarMultiColors,
//         xaxis: {
//             categories: ['Acceptance Of The Rights Of Others', 'Well-Functioning Government', 'Low Levels of Corruption', 'Equitable Distribution Of Resource', 'Good Relations With Neighbours', 'Free Flow Of Information', 'High Levels Of Human Capital', 'Sound Business Environment']
//         }
//     };
//     var chart = new ApexCharts(document.querySelector("#multi_radar"), options);
//     chart.render();
// }

// Polygon - Radar Charts
var chartRadarPolyradarColors = getChartColorsArray("polygon_radar");
if(chartRadarPolyradarColors){
var options = {
    series: [{
        name: 'Series 1',
        data: [20, 100, 40, 30, 50, 80, 33],
    }],
    chart: {
        height: 350,
        type: 'radar',
        toolbar: {
            show: false
        },
    },
    dataLabels: {
        enabled: true
    },
    plotOptions: {
        radar: {
            size: 140,

        }
    },
    title: {
        text: 'Radar with Polygon Fill',
        style: {
            fontWeight: 500,
        },
    },
    colors: chartRadarPolyradarColors,
    markers: {
        size: 4,
        colors: ['#fff'],
        strokeColor: '#f34e4e',
        strokeWidth: 2,
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return val
            }
        }
    },
    xaxis: {
        categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
    },
    yaxis: {
        tickAmount: 7,
        labels: {
            formatter: function (val, i) {
                if (i % 2 === 0) {
                    return val
                } else {
                    return ''
                }
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#polygon_radar"), options);
chart.render();
}