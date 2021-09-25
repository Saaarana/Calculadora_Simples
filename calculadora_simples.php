<?php 
	//Declarando variaveis e definindo tipos de dados
	$valor1 = (float) 0;
	$valor2 = (float) 0;
	$opcao = (string) null;
	$resultado = (float) 0;
    $radioSubtrair = (string) null; //Resolvendo o checked do radio na opção 02

    //1ª forma de criar uma constante - Permite a criação de uma constante no PHP
    //define("ERRO_CAIXA_VAZIA", "Não foi possível calcular, pois existem caixas Vazias!");
    
    //2ª forma de criar uma constante (mais atual)
    const ERRO_CAIXA_VAZIA = "Não foi possível calcular, pois existem caixas Vazias!";

	//Validação para testar se o botão calcular foi clicado
	if(isset($_POST['btncalc']))
	{
		//Recebendo dados do Formulário através do metodo POST
		$valor1 = $_POST['txtn1'];
		$valor2 = $_POST['txtn2'];
		$opcao = $_POST['rdocalc'];
		
		//Validação de Caixa Vazia
		if($valor1 == "" || $valor2 == "")
		{     //Para concatenar no PHP usamos o (.) ponto
			echo ("<span class='msgErro'>" . ERRO_CAIXA_VAZIA . "</span>");
		} else
		{
			//Processamento para definir qual calculo deverá ser realizado
                    /*if($opcao == 'somar')
                    {
                        
                    }elseif ($opcao == 'subtrair')
                    {
                        $resultado = $valor1 - $valor2;
                        $radioSubtrair = 'checked';
                    }elseif ($opcao == 'multiplicar')
                    {
                        $resultado = $valor1 * $valor2;
                    }elseif ($opcao == 'dividir')
                    {
                        $resultado = $valor1 / $valor2;
                    }*/
            
            //Outra alternativa para fazer as decisões do calculo, utilizando o metodo switch
            
            switch ($opcao) //Realiza o teste lógico de uma variavel
            {
                case 'somar': //Valida a saida da varaivel testada no switch
                    $resultado = $valor1 + $valor2;
                    break;
                    
                case 'subtrair': //Valida a saida da varaivel testada no switch
                    $resultado = $valor1 - $valor2;
                    $radioSubtrair = 'checked';
                    break;
                    
                case 'multiplicar': //Valida a saida da varaivel testada no switch
                    $resultado = $valor1 * $valor2;
                    break;
                    
                case 'dividir': //Valida a saida da varaivel testada no switch
                    $resultado = $valor1 / $valor2;
                    break;
            }
            
            
		}//Validação de Caixa Vazia	
	}//Validação se o botão foi clicado



?>
<html>
    <head>
        <title>Calculadora - Simples</title>
		<link rel="stylesheet" type="text/css" href="style.css">
    </head>
	<body>
        
        <div id="conteudo">
            <div id="titulo">
                Calculadora Simples
            </div>

            <div id="form">
                <form name="frmcalculadora" method="post" action="">
						Valor 1:<input type="text" name="txtn1" value="" placeholder="<?=$valor1?>" > <br>
						Valor 2:<input type="text" name="txtn2" value="<?=$valor2?>" > <br>
						<div id="container_opcoes">
							<input type="radio" name="rdocalc" value="somar"
                                   <?php 
                                        //Opção 01 para colocar o checked no radio 
                                        if($opcao == 'somar')
                                            echo('checked');
                                   
                                   ?>
                                   >Somar <br>
							<input type="radio" name="rdocalc" value="subtrair" 
                                   <?=$radioSubtrair?> >Subtrair <br>
							<input type="radio" name="rdocalc" value="multiplicar"
                                   <?=$opcao=='multiplicar'?'checked':'' ?>>Multiplicar <br>
							<input type="radio" name="rdocalc" value="dividir" 
                                   <?=$opcao=='dividir'?'checked':'' ?> >Dividir <br>
							
							<input type="submit" name="btncalc" value ="Calcular" >
							
						</div>	
						<div id="resultado">
							<?php echo ($resultado); ?>
						</div>
						
					</form>
            </div>
           
        </div>
        
		
	</body>

</html>

