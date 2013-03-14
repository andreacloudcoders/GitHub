<script type="text/javascript">
	function truncateURL(url) {
		if(url==undefined || url==null) return;
		url = url.substr(url.lastIndexOf('/')+1);
		if(url.lastIndexOf('?')>-1)
			url = url.substr(0, url.lastIndexOf('?'));
		//if(url.lastIndexOf('#')>-1)
			//url = url.substr(0, url.lastIndexOf('#'));
		return (url == '' ? 'index.php' : url);
	}
	
	function menuAutoSelect(id){
		var url = truncateURL(window.location.href);
		
			$('ul#'+id+'> li > a').each(function () {
				var current = truncateURL(""+this);
				if(current.indexOf(url) > -1)
					$(this).parent().attr("class", "active");
			});
		
	}
</script>
<div class="row-fluid">
<div class="span3">
  <div class="well sidebar-nav">
    <ul class="nav nav-list" id="menu">
      <li class="nav-header">DDT</li>
      <li><a href="nuovo_ddt.php">Nuovo DDT</a></li>
      <li><a href="lista_ddt.php">Lista DDT</a></li>
      <li class="divider"></li>
      <li class="nav-header">Fatture</li>
      <li><a href="nuova_fattura.php">Nuova Fattura</a></li>
      <li><a href="lista_fatture.php">Vedi Fatture</a></li>
      <li class="divider"></li>
      <li class="nav-header">Clienti</li>
      <li><a href="nuovo_cliente.php">Nuovo Cliente</a></li>
      <li><a href="modifica_cliente.php">Modifica Cliente</a></li>
      <li><a href="elimina_cliente.php">Elimina Cliente</a></li>
    </ul>
  </div><!--/.well -->
</div><!--/span-->

<script type="text/javascript">menuAutoSelect("menu");</script>
