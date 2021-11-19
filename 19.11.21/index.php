<?php
$pdo = new  PDO("mysql:dbname=ifc;localhost:3306","root","");
$pdo->setAttribute(PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE);
$procurar = isset ( $_POST ["procurar"])? $_POST ["procurar"]: "" ;
$consulta = isset ( $_POST ["consulta"])? $_POST ["consulta"]: 1;

?>
<html>
<body>
    <fieldset>
        <input  type = "radio" name = "consulta" value = "1"
        <?php  if ($consulta == 1) echo  'checked' ; ?>>Nome<br><br>
        <input  type = "radio" name = "consulta" value = "2"
        <?php if ($consulta == 2) echo 'checked'?>>Salário Fixo<br><br>
        <input type="submit" name="acao" id="acao">
        <br><br>
        <table>
        <tr>
         <b>Código</b>  <br>
         <b>Nome</b>  <br> 
         <b>Janeiro</b>  <br>
         <b>Comissão Janeiro</b>  <br>
         <b>Fevereiro</b>  <br>
         <b>Comissão Fevereiro</b>  <br>
         <b>Março</b>  <br>
         <b>Comissão Março</b>  <br>
         <b>Abril</b>  <br>
         <b>Comissão Abril</b>  <br>
         <b>Maio</b>  <br>
         <b>Comissão Maio</b>  <br>
         <b>Junho</b>  <br>
         <b>Comissão Junho</b>  <br>
         <b>Julho</b>  <br>
         <b>Comissão Julho</b>  <br>
         <b>Agosto</b>  <br>
         <b>Comissão Agosto</b>  <br>
         <b>Setembro</b>  <br>
         <b>Comissão Setembro</b>  <br>
         <b>Outubro</b>  <br>
         <b>Comissão Outubro</b>  <br>
         <b>Novembro</b>  <br>
         <b>Comissão Novembro</b>  <br>
         <b>Dezembro</b> <br>
         <b>Comissão Dezembro</b> <br>
         <b>Salário Fixo</b> <br>
         <b>Data de contratação</b> <br>
         <b>Total de Vendas do Ano</b> <br>
         <b>Anos na Empresa</b> <br>
         <b>Bônus</b> <br>


        </tr>
        <?php
        
        if($consulta == 1) 
            $procurar = $pdo->query("SELECT * FROM vendas 
                                     WHERE nome LIKE '$procurar%' 
                                     ORDER BY nome");   
        elseif($consulta == 2) 
            $procurar = $pdo->query("SELECT * FROM vendas 
                                     WHERE fixo<=  '$procurar%' 
                                     ORDER BY fixo");    
            while ($linha = $procurar->fetch(PDO::FETCH_ASSOC))    {    
            $totalvendas = $linha['janeiro'] + $linha['fevereiro'] + $linha['março'] + $linha['abril'] + $linha['maio'] + $linha['junho'] + $linha['julho'] + $linha['agosto'] + $linha['setembro'] + $linha['outubro'] + $linha['novembro'] + $linha['dezembro'];
            $comissao1 = $linha['janeiro'] * 0.03;
            $comissao2 = $linha['fevereiro'] * 0.03;
            $comissao3 = $linha['março'] * 0.03;
            $comissao4 = $linha['abril'] * 0.03;
            $comissao5 = $linha['maio'] * 0.03;
            $comissao6 = $linha['junho'] * 0.03;
            $comissao7 = $linha['julho'] * 0.03;
            $comissao8 = $linha['agosto'] * 0.03;
            $comissao9 = $linha['setembro'] * 0.03;
            $comissao10 = $linha['outubro'] * 0.03;
            $comissao11 = $linha['novembro'] * 0.03;
            $comissao12 = $linha['dezembro'] * 0.03;
            $hoje = date("Y");
            $fab = date("Y", strtotime($linha['dataContratacao']));
            $anos = $hoje - $fab;
            $bonus = $anos * 10;
        ?>
        <tr>
			<td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>   
            <td><?php echo number_format($linha['janeiro'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao1, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['fevereiro'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao2, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['março'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao3, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['abril'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao4, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['maio'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao5, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['junho'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao6, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['julho'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao7, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['agosto'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao8, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['setembro'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao9, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['outubro'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao10, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['novembro'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao11, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['dezembro'], 1, ',', '.');?></td>
            <td><?php echo number_format($comissao12, 1, ',', '.');?></td>
            <td><?php echo number_format($linha['fixo'], 1, ',', '.');?></td>
            <td><?php echo date("d/m/Y",strtotime($linha['dataContratacao']));?></td> 
            <td><?php echo number_format($totalvendas, 2, ',', '.');?></td>
            <td><?php echo $anos;?></td> 
            <td><?php echo number_format($bonus, 1, ',', '.');?></td>        
            </tr>
    <?php } ?>
           
        </table>
    </fieldset>
    </form>
</body>
</html>