<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <style>
            body{
                text-align:center;
            }
            table{
                margin:30px;
                font-size:16px;
                font-weight:bold;
                font-family:arial;
            }
            td{
                padding:20px;
                text-align:center;
                color:white;
            }
        </style>
        <script src="jquery-3.5.1.min.js"></script>
        
        <script>
            var id1=-1, id2=-1;

            function aparece(id){
                document.getElementById(id).style.color="black";
                if(id.charAt(1)==1 && id1==-1){
                    id1=id;
                }
                if(id.charAt(1)==2 && id2==-1){
                    id2=id;
                }
                if(id1!=-1 && id2!=-1){
                    apaga();
                    
                }
            }

            function apaga(){
                if(id1.charAt(0)!=id2.charAt(0)){
                    document.getElementById(id1).style.color="white";
                    document.getElementById(id2).style.color="white";
                }
                id1=-1;
                id2=-1;
            }
        </script>

    </head>
    <body>
    <?php
    $alfabeto = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
    

    $i=0;

    $vetor_escolha = array();

    while($i<20){
        $r = rand(0,25);
        if(!in_array($r,$vetor_escolha)){
            $vetor_escolha[$i] = $r;
            $i++;
        }
    }

    echo "<table border='1'>
            <tr>";

           

            for($j=0;$j<20;$j++){
               //abaixo linha que pode alterar o onclick
               echo "<td onclick=\"aparece('".$alfabeto[$vetor_escolha[$j]]."1')\" id='".$alfabeto[$vetor_escolha[$j]]."1'>".$alfabeto[$vetor_escolha[$j]]."</td>";
            }
            echo "</tr>";

            while($vetor_escolha!=null){
                $r = rand(0,19);
                $entrou=0;
                foreach($vetor_escolha as $i=>$v){
                    if($r==$i){
                        //abaixo linha que pode alterar o onclick
                        echo "<td  onclick=\"aparece('".$alfabeto[$vetor_escolha[$i]]."2')\" id='".$alfabeto[$vetor_escolha[$i]]."2'>".$alfabeto[$vetor_escolha[$i]]."</td>";
                        $entrou=1;
                        break;

                    }
                    
                }
                if($entrou)
                    unset($vetor_escolha[$i]);
            }
    
        echo "</tr>
          </table>";
    ?>
    </body>
</html>
