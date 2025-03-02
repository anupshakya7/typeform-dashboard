//flatpicker js
document.addEventListener('DOMContentLoaded', function () {
    // Initialize Flatpickr
    flatpickr('[data-provider="flatpickr"]', {
        dateFormat: 'd M, Y',
        enableTime: false, 
        mode: 'range', 
    });
});