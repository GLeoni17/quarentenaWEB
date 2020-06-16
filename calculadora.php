<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <link href="bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <title>Atividade Quarentena Web</title>

        <script>
            function soma(valor1, valor2){
                valor1=parseInt(valor1);
                valor2=parseInt(valor2);
                var resultado= valor1+valor2;
                if(!isNaN(valor1) && !isNaN(valor2) ){ <!--Escreve somente se tiver 2 numeros.-->
                    document.calculadora.res.value=resultado;
                }
            }

            function limpa(){
                document.calculadora.num1.value="";
                document.calculadora.num2.value="";
                document.calculadora.res.value="";
            }
        </script>

    </head>

    <body>

        <form name="calculadora">
            <input type="number" name="num1" placeholder="Operando 1"> +
            <input type="number" name="num2" placeholder="Operando 2"> =
            <input type="number" name="res" placeholder="resultado..." readonly=“true”> <!--Utilizado readlonly no resultado apenas para ficar melhor a visualização, não afeta nada.-->
            <br><br>
            <input type="button" value="Calcular" onclick="soma(document.calculadora.num1.value, document.calculadora.num2.value);">
            <input type="button" value="Limpar" onclick="limpa();">
        </form>

    </body>

</html>