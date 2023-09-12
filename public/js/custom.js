document.addEventListener("DOMContentLoaded", function () {
    const now = new Date().toISOString().slice(0, -8);
    
    const datetimeInputs = document.querySelectorAll(
        'input[type="datetime-local"]'
    );
    datetimeInputs.forEach((input) => {
        input.min = now;
    });
});
