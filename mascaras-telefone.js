
function mascara_celular(celular){ 
   if(celular.value.length == 0)
     celular.value = '(' + celular.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
   if(celular.value.length == 3)
      celular.value = celular.value + ')'; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.
 
 if(celular.value.length == 9)
     celular.value = celular.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
  
}

function mascara_fixo(fixo){ 
   if(fixo.value.length == 0)
     fixo.value = '(' + fixo.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
   if(fixo.value.length == 3)
      fixo.value = fixo.value + ')'; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.
 
 if(fixo.value.length == 8)
     fixo.value = fixo.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
  
}