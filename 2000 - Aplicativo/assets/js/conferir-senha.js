function confereSenha() {
    const senha = document.getElementById('senha');
    const confirma = document.getElementById('confirmar_senha');

    if(confirma.value === senha.value) {
        confirma.setCustomValidity('');
    } else {
        confirma.setCustomValidity('As senhas não conferem');
    }
}