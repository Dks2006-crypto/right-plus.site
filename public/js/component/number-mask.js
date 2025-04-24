// Маска ввода (IMask.js)
document.addEventListener("DOMContentLoaded", function () {
    const phoneInput = document.getElementById("phone-input");
    const maskOptions = {
        mask: "+{7} (000) 000-00-00",
        lazy: false, // маска всегда видна
    };
    IMask(phoneInput, maskOptions);
});
