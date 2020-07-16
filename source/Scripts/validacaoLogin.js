$("#formLogin").validate({
    rules:{
        email: {
            required: true,
            email: true
        },
        senha: {
            required: true
        }
    },
    messages:{
        email:{
            required: "Campo Obrigatório.",
            email: "Informe um E-mail válido."
        },
        senha: {
            required: "Campo Obrigatório."
        }
    }
    
});