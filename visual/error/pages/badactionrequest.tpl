The action you've requested needs more info<br />
Required parameters:<br />
<ul>
	{foreach from=$requiredparams key=varname item=param}
	<li>
		{$varname} - {if $param == 1}REQUIRED{else}OPTIONAL{/if}
	</li>
	{/foreach}
</ul>
Oops, try again