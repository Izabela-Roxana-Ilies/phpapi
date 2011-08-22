Hello there {$user_profile["first_name"]} (<a href='/API/user/logout'>Logout</a>), you are using the PHP API system. Enjoy.
<br />

<a href="/API/test/hello" rel="api_call">Call to the API: &quot;/API/test/hello&quot;</a>
<ul id="api_answers"></ul>
<table>
	<thead>
		<tr>
			<th>Operand 1</th>
			<th>Operator</th>
			<th>Operand 2</th>
			<th>&nbsp;</th>
			<th>Result</th>
		</tr>
	</thead>
	<tbody>
	<tr>
		<td><input type="text" name="operand1" value="0" /></td>
		<td><select name="operator">
			<option value="+">+</option>
			<option value="-">-</option>
			<option value="*">*</option>
			<option value="/">/</option>
		</select></td>
		<td><input type="text" name="operand2" value= "0" /></td>
		<td><a href="API/test/math" rel="api_call_math">Do the math</a></td>
		<td id="math_result"></td>	
	</tr>	
	</tbody>
</table>

