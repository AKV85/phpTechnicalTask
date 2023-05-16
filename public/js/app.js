document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');

    if (successMessage) {
        const successDelay = parseInt(successMessage.dataset.delay) * 1000;
        setTimeout(function () {
            successMessage.style.display = 'none';
        }, successDelay);
    }

    if (errorMessage) {
        const errorDelay = parseInt(errorMessage.dataset.delay) * 1000;
        setTimeout(function () {
            errorMessage.style.display = 'none';
        }, errorDelay);
    }
});



