{include file="../visualinclude/head.tpl"}
<body>
Get some math going ( simple .. just add all the operands )
<div id="operands_holder">
	<div><label>Operand:</label><input type="text" name="operand" value="0.0" api_type="array" rel="calculator_sum" /></div>
</div>
<input type="button" value="Add operand" id="add_operand" />
&nbsp;
<input type="button" value="Sum them up" name="calculator_sum" rel="api" /><br />
<input type="text" readonly="readonly" id="calculator_sum_result" />
</body>
</html>
