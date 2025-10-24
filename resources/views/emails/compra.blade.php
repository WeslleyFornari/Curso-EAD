<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Confirmação de Pedido</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }
    h1 {
        color: #333;
    }
    h2 {
        color: #555;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>

<table width="100%" style="max-width:700px;background:#f7f7f7; margin-left: auto;margin-right:auto; padding:15px; border-radius:10px;" border="0">
      <tr>
        <td colspan="2"><h1>Pedido: Nº: 0AYHS3-0049</h1></td>
        <td colspan="2">&nbsp;</td>
        <td width="0">&nbsp;</td>
      </tr>
      <tr>
        <td width="25%">&nbsp;</td>
        <td width="27%">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><label>Cliente:</label></td>
        <td colspan="2"><label>Documento:</label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">Rafael William Malgueiro Badari</td>
        <td colspan="2">328.526.128-52</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td> (12) 99139-5346</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><label>Data Venda: </label></td>
        <td>&nbsp;</td>
        <td colspan="2"><label>Status</label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>09/04/2024</td>
        <td>&nbsp;</td>
        <td colspan="2">
        <span style="
        background:rgb(130, 214, 22);
        color:black;
        display:inline-block; font-size:14px;padding:5px"><strong>APROVADO</strong></span>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><table width="100%" border="0">
          <tr style="background:#00194a;color:#fff">
            <td width="4%" style="padding:5px"><strong>#</strong></td>
            <td width="34%" style="padding:5px"><strong>Produto</strong></td>
            <td width="17%" align="center" style="padding:5px"><strong>Qtd</strong></td>
            <td width="23%" align="center" style="padding:5px"><strong>Valor</strong></td>
            <td width="22%" align="center" style="padding:5px"><strong>Total</strong></td>
          </tr>
          <tr>
            <td>1</td>
            <td>Escola de Psicanálise </td>
            <td align="center">1</td>
            <td align="center">R$ 487,00 </td>
            <td>R$ 487,00 </td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="25%"><strong>Sub Total </strong></td>
        <td width="25%">R$ 487,00</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>Desconto</strong></td>
        <td>-R$ 0,00</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>Total</strong></td>
        <td>R$ 487,00 </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    
<div class="container">
    <h1>Confirmação de Pedido</h1>
    <p>Caro {{explode(' ',$name)[0]}},</p>
    <p>Obrigado por fazer o seu pedido conosco. <br>
    Abaixo estão os detalhes do seu pedido:</p>
    <h2>Número do Pedido: {{$pedido['numero_pedido']}}</h2>
    <h2>Data do Pedido: {{ \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $pedido['created_at'])->format('d/m/Y') }}</h2>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
            </tr>
        </thead>
        <tbody>

     
          @foreach($itens_pedidos as $k => $item)
            <tr>
                <td>{{$item->produto->nome}}</td>
                <td>1</td>
                <td>R$ {{getMoney($item->valor_final)}}</td>
            </tr>
          @endforeach
           
        </tbody>
    </table>
    <h2>Total do Pedido: R$ {{getMoney($pedido['valor_final'])}}</h2>
    <p>&nbsp;</p>
    <p>Atenciosamente,<br></p>
</div>
</body>
</html>