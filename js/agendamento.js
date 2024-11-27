class cadastro{
    constructor(nome,sobrenome,telefone,email){
        this.nome = nome;
        this.sobrenome = sobrenome;
        this.telefone = telefone;
        this.email = email;
    }
}

let verificarEmail = document.querySelector("#email");

verificarEmail.addEventListener("blur", function(e){
    let email = verificarEmail.value;
    const verificaEmail = /\w+@\w+.com|.com.br/;
    if(verificaEmail.test(email) == false){
        window.alert("Email invalido");
    }
});