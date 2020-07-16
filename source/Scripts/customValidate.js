$.validator.addMethod('stringValidate', function(value){
    
    if(value.search(/[A-z\s]/) > -1){

        if (value.search(/[\d]/) > -1 || value.search(/[\<\>\!\@\#\$\%\¨\&\*\(\)\+\=\-\{\}\[\]\;\:\,\.\\\|\/\'\"¹²³£¢¬]/) > -1) {
            return false;
        }

        return true;

    } else {
        return false;
    }

}, "Este campo deve conter somente caracteres.");

$.validator.addMethod('dateValidate', function(value){
    var months = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    var inputDate = value.split("-");
    var dd = parseInt(inputDate[2]);
    var mm = parseInt(inputDate[1]);
    var yy = parseInt(inputDate[0]);
    var thisYear = new Date().getFullYear();

    if (dd <= months[mm - 1]) {

        if (yy <= thisYear && yy >= 1900) {
            return true;

        } else {
            return false;

        }

    } else {
        return false;

    }



}, "Informe uma data válida!");

$.validator.addMethod('cpfValidate', function(value){
    var cpf = value.replace(/\./g, "");
    cpf = cpf.split("-");
    var result = 0;

    var validate1 = cpf[0].split("");

    for (var i = 0; i < validate1.length; i++)
        result += parseInt(validate1[i]) * (i + 1);

    var digit = result % 11;

    if (digit == 10)
        digit = 0;



    validate1.push(digit);
    var validate2 = validate1;

    result = 0;
    for (var i = 0; i < validate2.length; i++)
        result += parseInt(validate2[i]) * i;

    digit = result % 11;

    if (digit == 10)
        digit = 0;




    validate2.push(digit);
    var cpfResult = validate2.toString().replace(/\,/g, "");
    var cpfOriginal = cpf.toString().replace(",", "");
    

    if (cpfResult == cpfOriginal) {
        return true;

    } else {
        return false;
    }

}, "Informe um CPF válido.");   

function cepRequest(){
    var cep = document.querySelector("#validationcep").value;
    cep = cep.replace("-", "");

    if (cep.search(/\d{5}\d{3}/) == 0) {
        var xhr = new XMLHttpRequest();

        xhr.open("GET", "https://viacep.com.br/ws/"+ cep +"/json/", false);
        xhr.send(null);

        var data = JSON.parse(xhr.responseText);

        return data;
    }

}


$.validator.addMethod('cepValidate', function(value){
    var cep = value.replace("-", "");
    var endereco = document.querySelector("#validationendereco");
    var bairro = document.querySelector("#validationbairro");
    var cidade = document.querySelector("#validationcidade");
    var estado = document.querySelector("#validationestado");

    if (cep.search(/\d{5}\d{3}/) == 0) {
        var data = cepRequest();

        if (data.erro == true) {
            endereco.value = "";
            bairro.value = "";
            cidade.value = "";
            estado.value = "";
            return false;

        } else{
            endereco.value = String(data.logradouro);
            bairro.value = String(data.bairro);
            cidade.value = String(data.localidade);
            estado.value = String(data.uf);
            return true;
        }

    }
    

}, "Por favor informe um cep válido.");


$.validator.addMethod("enderecoValidate", function(value){

    var data = cepRequest();

    
    if (data != undefined) {
        if (value.toLowerCase() == data.logradouro.toLowerCase()) {
            if (value.search(/[^A-z\s\d]/) > -1) {
                return false;
            }

            return true;
    
        } else {
            return false;
        }
    }


}, "Este endereço não é válido para o cep informado.");


$.validator.addMethod("bairroValidate", function(value){
    var data = cepRequest();


    if (data != undefined) {        
        if (value.toLowerCase() == data.bairro.toLowerCase()) {
            return true;

        } else {
            return false;
        }

    }
  
}, "Este bairro não é válido para o cep informado.");

$.validator.addMethod("cidadeValidate", function(value){
    var data = cepRequest();

    if (data != undefined) {        
        if (value.toLowerCase() == data.localidade.toLowerCase()) {
            return true;

        } else {
            return false;
        }

    }

}, "Esta cidade não é válida para o cep informado.");

$.validator.addMethod("estadoValidator", function(value){
    var data = cepRequest();

    if (data != undefined) {
        if (value.toLowerCase() == data.uf.toLowerCase()) {
            return true;

        } else {
            return false;
        }

    }

}, "Este estado não é válido para o cep informado.");



$.validator.addMethod('complementoValidate', function(value){
    
    if (value.search(/\w\s|\w/) > -1 || value == "") {

        if(value.search(/[^\w\s]/) > -1){
            return false;
        }
        
        return true;

    } else {
        return false;
    }

}, "Informe um complemento válido.");


$.validator.addMethod('tellValidate', function(value, element){
    var ddd = [
        11, 12, 13, 14, 15, 16, 17, 18, 19, 21, 22, 24, 27, 28, 31, 32, 33, 34,
        35, 37, 38, 41, 42, 43, 44, 45, 46, 47, 48, 49, 51, 53, 54, 55, 61, 62,
        63, 64, 65, 66, 67, 68, 69, 71, 73, 74, 75, 77, 79, 81, 82, 83, 84, 85,
        86, 87, 88, 89, 91, 92, 93, 94, 95, 96, 97, 98, 99
        ];

    var arrayDdd = value.split("");
    var num2 = arrayDdd[2] == undefined ? 0 : arrayDdd[2];
    var inputDdd = parseInt(arrayDdd[1] + num2);


    if (ddd.indexOf(inputDdd) > -1) {

        if (element.id == "validationcelular") {
            if (value.search(/\(\d{2}\)\s\9\d{5}\-\d{3}/) > -1) {
                return true;
    
            } else {
                return false;
            }
        } else if (element.id == "validationtelefonealternativo") {
            var telefone = document.querySelector("#validationtelefone").value;

            if (element.value == telefone) { 
                return false;

            } else {
                return true;
            }

        } else {
            return true;
        }
 

    } else {
        return false;
    }


}, "Informe um número de Telefone válido.");