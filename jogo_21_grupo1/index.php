<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <style>
        /*versão final*/
            body{
                text-align:center;
                background-color:rgb(27, 90, 27);
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
            .cartas{
                float:left;
                height:100px;
                border: 1px solid black;
                margin-top:50px;
            }
            .cartas_abertas{
                /*margin-top:100px;*/
                height:100px;
                border: 1px solid black;
            }
            .placar1{
                padding: 0px 8px 0px 8px; 
                border-radius: 10px;
                border:2px solid white;
                float:left;
                font-family:Arial, Helvetica, sans-serif;
                font-size: 12;
                text-align:center;
                color:white; 
            }
            .placar2{
                padding: 0px 8px 0px 8px; 
                border-radius: 10px;
                border:2px solid white;
                float:right;
                font-family:Arial, Helvetica, sans-serif;
                font-size: 12;
                text-align:center;
                color:white;
            }
        </style>
        
        <script>
            pontos1=0;
            pontos2=0;
            vez=1;
            function placar(pontuacao_carta, id, carta){
                if(vez == 1){
                    pontos1+=pontuacao_carta;
                    vez++;
                }else{
                    pontos2+=pontuacao_carta;
                    vez--;
                }
                if(pontos1>21){
                    alert("Jogador 1 perdeu!");
                    location.href="index.php";
                }
                if(pontos2>21){
                    alert("Jogador 2 perdeu!");
                    location.href="index.php";
                }
                if(pontos1 == 21){
                    alert("Jogador 1 ganhou!");
                    location.href="index.php";
                }
                if(pontos2 == 21){
                    alert("Jogador 2 ganhou!");
                    location.href="index.php";
                }
                document.getElementById('cartas_abertas').innerHTML+="<img src='img/"+carta+".png' class='cartas_abertas' />";
                document.getElementById(id).style.display="none";
                document.getElementById("placar1").innerHTML=pontos1;
                document.getElementById("placar2").innerHTML=pontos2;
            }

            function passar(){
                if(vez==1 && pontos1>pontos2){
                    alert("Passou a vez!");
                    vez++;
                    exit;
                }else if(vez==1 && pontos1<pontos2){
                    alert("Não pode passar a vez.");
                }

                if(vez==2 && pontos2>pontos1){
                    vez--;
                    alert("Passou a vez!");
                }else if(vez==2 && pontos2<pontos1){
                    alert("Não pode passar a vez.");
                }
            }
            
        </script>

    </head>
    <body>
        <div id="" position=absolute class="placar1">
            <h2>Jogador 1</h2>
            <br>
            <h2>Pontuação</h2>
            <h2 id="placar1">0</h2>
        </div>

        <div id="" position=absolute class="placar2">
            <h2>Jogador 2</h2>
            <br>
            <h2>Pontuação</h2>
            <h2 id="placar2">0</h2>
        </div>
    <?php
        for($i=1; $i<=13; $i++){
            for($j=1; $j<=4; $j++){
                $baralho[$i][$j]=$i.$j;
            }
        }
            echo "<div id='cartas'>";
            for($i=1; $i<=52; $i++){
                do{
                    $r1=rand(1, 13);
                    $r2=rand(1, 4);
                    if($baralho[$r1][$r2]!=0){
                        echo "<div id=p".$i." class='cartas'> <img width=80px height=120px src='img/carta_virada.png' onclick=\"placar(".$r1.", 'p$i', ".$r1.$r2.")\" style=\"z-index:".$i."; position:absolute;\" /> </div>";
                        $baralho[$r1][$r2]=0;
                        break;
                    }
                }while(true);
                
            }
            echo "</div>";
            
    ?>
    <center> 
        <img src="img/passar.png" onclick="passar()" height="50px" width="50px" style="margin-bottom:70px;" />
    
        <div id="cartas_abertas" style="margin-top:70px;">
            
        </div>
    </center>
    </body>
</html>