const inputs = document.querySelectorAll(".otp-input");


inputs.forEach((input, index) => {
    input.addEventListener("input", (e) => {
        // Eğer input'a bir değer girilmişse ve son input değilse, bir sonraki input'a odaklan.
        if (e.target.value && index < inputs.length - 1) {
            inputs[index + 1].focus();
        }

        // Tüm inputların değerini al ve 'full_code' input'unu güncelle.
        const fullCode = Array.from(inputs).map(i => i.value).join('');
        document.getElementById("full_code").value = fullCode;

        // Gelişmiş kontrol için console.log ile fullCode'u yazdır.
        console.log(fullCode);
    });


    input.addEventListener("keydown", (e) => {
        if (e.key === "Backspace" && index > 0 && !e.target.value) {
            inputs[index - 1].focus();
        }
    });
});
document.querySelectorAll('.otp-input').forEach(input => {
    input.addEventListener('input', function (e) {
        let value = this.value;


        if (value.length === 1) {
            let nextInput = this.nextElementSibling;
            if (nextInput && nextInput.classList.contains('otp-input')) {
                nextInput.focus();

            }
        }
    });
});

document.querySelector('.otp-container').addEventListener('paste', function (e) {
    e.preventDefault();
    let paste = (e.clipboardData || window.clipboardData).getData('text');
    let inputs = document.querySelectorAll('.otp-input');



    for (let i = 0; i < inputs.length; i++) {
        if (paste[i]) {
            inputs[i].value = paste[i];
            const fullCode = Array.from(inputs).map(i => i.value).join('');
            document.getElementById("full_code").value = fullCode;
        }
    }
});