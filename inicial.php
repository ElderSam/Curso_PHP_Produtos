<?php require_once("conexao/conexao.php"); ?>

<?php
    // Determinar localidade BR
   // setlocale(LC_ALL, 'pt_BR');

    // Consulta ao banco de dados
    $sql = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena ";
    $sql .= "FROM produtos ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_OBJ);


    if(!$resultado) {
        die("Falha na consulta ao banco");   
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produtos.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            
           <div id="listagem_produtos"> 
            <?php
                foreach($resultado as $linha) {
            ?>
                <ul>
                    <li class="imagem">
                        <a href="detalhe.php?codigo=<?php echo $linha->produtoID ?>">
                            <img src="<?php echo $linha->imagempequena ?>">
                        </a>
                    </li>
                    <li><h3><?php echo $linha->nomeproduto ?></h3></li>
                    <li>Tempo de Entrega : <?php echo $linha->tempoentrega ?></li>
                    <li>Pre&ccedil;o unit&aacute;rio : <?php echo "R$ " . number_format($linha->precounitario,2,",",".");
                    /*money_format('%.2n',$linha->precounitario)*/ ?></li>
                </ul>
             <?php
                }
            ?>           
            </div>
            
        </main>

        <?php include_once("_incluir/rodape.php"); ?>  
    </body>
</html>
