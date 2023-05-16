document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        const successDelay = parseInt(successMessage.dataset.delay) * 1000;
        setTimeout(function () {
            successMessage.style.display = 'none';
        }, successDelay);
    }
});
s


