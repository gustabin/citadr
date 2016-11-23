<?php 
  require_once('lib/corelib.php');
  require_once('lib/class/clientesBD.php');
  include 'headers/header.php'; 
  error_reporting(1); 
?>
<script type = "text/javascript">
$(document).ready(function(){
	//load the current contents of search result
	//which is "Please enter a name!"
	$('#s-results').load('clienteData.php?option=4').show();
	
	
	$('#search-btn').click(function(){
		showValues();
	});
	
	$(function() {
		$('sform').bind('submit',function(){
			showValues(); 
			return false; 
		}); 
	});
		
	function showValues() {
		//loader will be show until result from
		//search_results.php is shown
		$('#s-results').html('<p><img src="img/loading.gif" /></p>');  
		
		//this will pass the form input
		$.post('clienteData.php?option=4', { name: sform.name.value },
		
		//then print the result
		function(result){
			$('#s-results').html(result).show();
		});
	}
		
});
</script>
<script type='text/javascript'>                             // tablesorter
    $(document).ready(function() {
        $("#sTable").tablesorter({
            //for example we want to disable the
            //password column (5th column) from sorting
            //we will specify '4' since it was indexed
            //(count starts at '0')
            //and set its property to 'false'
            headers: {
                4: {   
                    sorter: false
                }
            }
        });
    });
</script>
<script type = "text/javascript">                            // tablesorter pagination
$(document).ready(function() {
    $('#sTable').tablesorter().tablesorterPager({container: $("#pager")}); 
}); 
</script>
<script type="text/javascript">

            $(function() {
                //Realizamos la búsqueda del autocompletado
                $("#nameSearch").autocomplete({
                    minLength: 2,
                    source: function(request, response) {
                        $.ajax({
                            url: "clienteData.php?opcion=5",
                            dataType: "json",
                            data: {
                                maxRows: 1000,
                                term: request.term
                            },
                            success: function(data) {
                                response($.map(data, function(item) {
                                    var name = [item.cl_codigo + ' ' + item.cl_nombre];
                                    return {
                                        label: name,
                                        value: item.cl_codigo
                                    }
                                }));
                            }
                        });
                    }
                });
            });
        </script>
<!--Content-->

<section id="content1" class="section" style="background-image:url(img/grid_noise.png)">
  <div class="container">
    <div class="row margin-15">
      <h3>Clientes</h3>
    </div>
    <div class="col-md-12 column">
      <div class="form-group col-md-4">
      <form  method="post" name="sform" id="searchform">
        <div class="controls">
          <input type="text" id="name" name="name" placeholder="C&oacute;digo / Raz&oacute;n Social"/>	  
        </div>
        </div>
        <div class="form-group col-md-8">
        <div class="controls">
           <button id="search-btn" type="submit" name="submit" class="btn-main"><i class="fa fa-search fa-lg"></i> Buscar </button>
      </form>
      <a href='clienteAdd.php'>
      <button type="button" class="btn-main"><i class="fa fa-plus fa-lg"></i> Nuevo </button>
      </a> </div>
  </div>
  </div>
<?php
  isset( $_REQUEST['name'] ) ? $name=$_REQUEST['name'] : $name='';
  $Obj_Cliente  = new Cliente();
  $Data_Cliente = $Obj_Cliente->BuscaClientes($name);
?>
  <div id="sresults" class="col-md-12">
    <table id="sTable" class="tablesorter table table-bordered table-hover" style="border:1px solid #ECF0F1">
      <thead>
        <tr>
          <th width="10%" class="header" style="text-align: center">C&oacute;digo</th>
          <th width="40%" class="header">Nombre / Raz&oacute;n Social</th> 
          <th width="10%" class="header" style="text-align: center">Rif</th>
          <th width="10%" class="header" style="text-align: center">Tel&eacute;fono</th>
          <th width="10%" class="header" style="text-align: center; width: 10%;background-image: none;">Acci&oacute;n</th>
        </tr>
      </thead>
      <tbody>
        <?php
                foreach ($Data_Cliente AS $Data) {
        ?>
        <tr>
          <td style="text-align: right"><?php echo $Data['cl_codigo']; ?></td>
          <td><?php echo $Data['cl_nombre']; ?></td>
          <td style="text-align: right"><?php echo substr($Data['cl_rif'],0,1).'-'.substr($Data['cl_rif'],1); ?></td>
          <td style="text-align: center"><?php echo $Data['cl_telefono']; ?> </td>
          <td style="text-align: center"><a href="clienteUpdt.php?cl_codigo=<?php echo $Data['cl_codigo']; ?>"><i class="fa fa-pencil fa-lg"></i></a></td>
        </tr>
        <?php    } ?>
      </tbody>
    </table>
    <!-- pager -->
    <div id="pager" class="pager">
      <form>
        <input class="pagedisplay" readonly type="text">
        <button type="button" class="btn-main first"><i class="fa fa-fast-backward"></i></button>
        <button type="button" class="btn-main prev"><i class="fa fa-backward"></i></button>
        <button type="button" class="btn-main next"><i class="fa fa-forward"></i></button>
        <button type="button" class="btn-main last"><i class="fa fa-fast-forward"></i></button>
        <select class="styled-select pagesize" style="height:40px">
          <option selected="selected" value="10">10</option>
          <option value="20">20</option>
          <option value="30">30</option>
          <option value="50">50</option>
        </select>
      </form>
    </div>
  </div>
  </div>
</section>
<!-- .................................... $footer .................................... -->
<?php include "headers/footer.php"; ?>
