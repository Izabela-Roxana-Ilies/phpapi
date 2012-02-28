{include file="../visualinclude/head.tpl"}
<body>

  <div id="container" dir="ltr">
    <header>
	
    </header>
    <div id="main" role="main">
	
	{literal}

<div>
	<h1>What's this about ?</h1>
<p>
This is the skeleton upon which you can develop a web-system from a simple Web Calculator to the most sofisticated CRM/ERP/CMS/ETC.
What PHPAPI provides is:
</p>
<ol>
<li> a general structure of the code</li>

<li> a very simple extendable API code structure</li>

<li> JavaScript connectivity with the API ( with an easy way of adding new modules/method handlers )</li>

<li> low count of resources loaded into the browser ( the API and the init JavaScript files that are first loaded are a few lines of code, the rest is pulled only if required )</li>

<li> a Facebook PHP SDK integration ready to go ( and easily removable if not needed ) (this uses the <a href="https://github.com/facebook/php-sdk" target="_blank" rel="nofollow">Facebook PHP SDK</a>)</li>

<li> Templating using <a href="http://www.smarty.net" target="_blank" rel="nofollow">Smarty</a> </li>

<li> Cross browser code ( using <a href="http://jquery.com" rel="nofollow" target="_blank">jQuery</a> and <a href="http://html5boilerplate.com/" rel="nofollow" target="_blank">HTML5 boiler plate</a> project )</li>
</ol>
<div class="getit">
	 <a href="http://www.paywithatweet.com/pay/?id=67667e4e5f90b8d33d069cac7e341c00" target="_blank">Download Source Code (pay with a tweet)</a><br />
	 <a href="https://github.com/RobertDoroftei/phpapi/zipball/v2-No-Page-Refresh" target="_blank" class="smaller_download">Be a bastard and download it without a tweet(V2)</a>
</div>
<h2>How to "install" it ?</h2>
<ol>
<li> Copy the  <a href="https://github.com/RobertDoroftei/phpapi" class='repository' target="_blank">repository</a></li>

<li> Create a database ( import <em>phpapi.sql</em> into the database )</li>

<li> Edit the <em>config.inc.php</em> file to suit your application ( database connection, the document root of your application and application URL )</li>

<li> Run it ( comes with a Hello world implementation and a basic calculator )</li>
</ol>
<h2>How to extend it ?</h2>
<ol>
<li> Extend the API functionality with new modules by copying <em>/includes/engine/api/calculator/sub.php</em> and rename it to <em>whatever_you_want_the_module_to_be_called</em>
<br />
</li>

<li>
	One thing to remember: the API is built with a namespace scheme in mind:
	<ul>
		<li>
			namespace
			<ul>
				<li>subnamespace
					<ul>
						<li>
							anothersubnamespace
							<ul>
								<li>
									method
								</li>
							</ul>
						</li>
						<li>
							method1
						</li>
						<li>
							method2
						</li>
					</ul>	
				</li>
				<li>
					methodX
				</li>
			</ul>
		</li>
		<li>
			methodN...
		</li>
	</ul>
	
</li>

<li> Nothing else :P</li>
</ol>

<strong>Enjoy</strong>

</div>

<div class="getit">
	 <a href="http://www.paywithatweet.com/pay/?id=67667e4e5f90b8d33d069cac7e341c00" target="_blank">Download Source Code (pay with a tweet)</a><br />
	 <a href="https://github.com/RobertDoroftei/phpapi/zipball/v2-No-Page-Refresh" target="_blank" class="smaller_download">Be a bastard and download it without a tweet(V2)</a>
</div>
{/literal}
	
	
	
	Get some math going ( simple .. just add all the operands )
	<div id="operands_holder">
		<div><label>Operand:</label><input type="text" name="operand" value="0.0" api_type="array" rel="calculator_sum" /></div>
	</div>
	<input type="button" value="Add operand" id="add_operand" />
	&nbsp;
	<input type="button" value="Sum them up" name="calculator_sum" rel="api" /><br />
	<input type="text" readonly="readonly" id="calculator_sum_result" />
	
	</div>
    <footer>
		<div class="share">
			<iframe src="http://www.facebook.com/plugins/like.php?app_id=101677443271579&amp;href=http%3A%2F%2Fwww.phpapi.org%2F&amp;send=false&amp;layout=button_count&amp;width=30&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe>
	<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
	<script type="IN/Share" data-counter="right"></script>
	<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<div class="g-plusone" data-size="small" href="http://www.phpapi.org/"></div>
<script type="text/javascript">
{literal}
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
  {/literal}
</script>

</div>
		<span>phpAPI.org &copy;{$local.copyright_year}</span>
    </footer>
  </div>
	<script type="text/javascript" src="//www.google.com/jsapi"></script>
	<script type="text/javascript" src="/static/js/json2.js"></script>
	<script type="text/javascript" src="/static/js/api/api.js"></script>
	<script type="text/javascript" src="/static/js/init.js"></script>
	<script>
		var IS_USER = {if $user}true{else}false{/if};
	</script>
    <script>
  	{literal}
    window._gaq = [['_setAccount','UA-25274593-1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
    {/literal}
  </script>
    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>{literal}window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})}){/literal}</script>
  <![endif]-->
</body>
</html>
