document.addEventListener('DOMContentLoaded', function () {
    const cepInput = document.getElementById('cep');
    const cidadeInput = document.getElementById('cidade');
    const buscarBtn = document.getElementById('buscarBtn');


    cepInput.addEventListener('input', () => {
        if (cepInput.value.length > 0) {
            cidadeInput.value = '';
        }
    });

    cidadeInput.addEventListener('input', () => {
        if (cidadeInput.value.length > 0) {
            cepInput.value = '';
        }
    });


});
