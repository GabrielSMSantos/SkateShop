$("#formUser").validate({
    rules: {
        nome: {
            required: true,
            rangelength: [2, 50],
            stringValidate: true
        },
        cpf: {
            required: true,
            cpfValidate: true
        },
        rg: {
            required: true,
            minlength: 8
        },
        datadenascimento: {
            required: true,
            dateValidate: true
        },
        cep: {
            required: true,
            cepValidate: true
        },
        endereco: {
            required: true,
            rangelength: [5, 50],
            enderecoValidate: true
        },
        numero: {
            required: true
        },
        complemento: {
            complementoValidate: true
        },
        bairro: {
            required: true,
            rangelength: [5, 50],
            stringValidate: true,
            bairroValidate: true
        },
        cidade: {
            required: true,
            rangelength: [5, 50],
            stringValidate: true,
            cidadeValidate: true
        },
        estado: {
            required: true,
            rangelength: [2, 50],
            stringValidate: true,
            estadoValidator: true
        },
        telefone: {
            required: true,
            tellValidate: true
        },
        telefonealternativo: {
            required: true,
            tellValidate: true
        },
        celular: {
            required: true,
            tellValidate: true
        },
        email: {
            required: true,
            email: true
        },
        confemail: {
            required: true,
            email: true,
            equalTo: "#validationemail"
        },
        senha: {
            required: true
        },
        confsenha: {
            required: true,
            equalTo: "#validationsenha"
        }

    },
    messages: {
        nome: {
            required: "Campo Obrigatório.",
            rangelength: "Nome deve no mínimo ter 2 e no máximo 50 caracteres"
        },
        cpf: {
            required: "Campo Obrigatório."
        },
        rg: {
            required: "Campo Obrigatório.",
            minlength: "Tamanho mínimo é de 8 caracteres"
        },
        datadenascimento: {
            required: "Campo Obrigatório."
        },
        cep: {
            required: "Campo Obrigatório."
        },
        endereco: {
            required: "Campo Obrigatório.",
            rangelength: "Tamanho mínimo é de 5 e no máximo 50 caracteres"
        },
        numero: {
            required: "Campo Obrigatório."
        },
        complemento: {
            required: "Campo Obrigatório."
        },
        bairro: {
            required: "Campo Obrigatório.",
            rangelength: "Tamanho mínimo é de 5 e no máximo 50 caracteres"
        },
        cidade: {
            required: "Campo Obrigatório.",
            rangelength: "Tamanho mínimo é de 5 e no máximo 50 caracteres"
        },
        estado: {
            required: "Campo Obrigatório.",
            rangelength: "Tamanho mínimo é de 2 e no máximo 50 caracteres"
        },
        telefone: {
            required: "Campo Obrigatório."
        },
        telefonealternativo: {
            required: "Campo Obrigatório."
        },
        celular: {
            required: "Campo Obrigatório.",
            tellValidate: "Informe um número de celular válido."
        },
        email: {
            required: "Campo Obrigatório.",
            email: "Informe um E-mail válido."
        },
        confemail: {
            required: "Campo Obrigatório.",
            email: "Informe um E-mail válido.",
            equalTo: "Repita o E-mail corretamente por favor."
        },
        senha: {
            required: "Campo Obrigatório."
        },
        confsenha: {
            required: "Campo Obrigatório.",
            equalTo: "Repita a Senha corretamente por favor."
        }


    }
});