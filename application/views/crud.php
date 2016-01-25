
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>DataTables Bootstrap 3 example</title>

	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

	<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
	</head>
	<body>
	<br/><br/>

	    <button class="btn btn-success" onclick="modal_add()"><i class="glyphicon glyphicon-plus"></i> Add Person</button>

		<div class="container">
	<br/><br/>
			
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed" id="example">
				<thead>
					<tr>
						<th>firstName</th>
						<th>lastName</th>
						<th>gender</th>
						<th>address</th>
						<th>dob</th>
						<th>action</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			
		</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Data</h4>
      </div>
      <div class="modal-body">
        
<form id="form">
	<input type="hidden" value="" name="id"/> 
  <div class="form-group">
    <label for="nm">first name</label>
    <input type="text" class="form-control" id="first" name="first">
  </div>
  <div class="form-group">
    <label for="gd">last name</label>
    <input type="text" class="form-control" id="last" name="last">
  </div>
  <div class="form-group">
    <label for="pn">gender</label>
    <input type="text" class="form-control" id="gender" name="gender">
  </div>
  <div class="form-group">
    <label for="al">address</label>
    <input type="text" class="form-control" id="address" name="address">
  </div>
</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save" onclick="add_orang()" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> 

	</body>

	<script type="text/javascript">
		$(document).ready(function() {
		    table = $('#example').DataTable( {
		        "ajax": "<?php echo site_url('crud/data_list')?>",
		        "columns": [
		            { "data": "firstName" },
		            { "data": "lastName" },
		            { "data": "gender" },
		            { "data": "address" },
		            { "data": "dob" },
		            { "data": "action" }
		        ]
		    } );
		});


		function delete_orang(id){
			if (confirm('tenan??')) {
				$.ajax({
					url:"<?php echo site_url('crud/jax_del')?>?id="+id,
					type:"POST",
					dataType:"JSON",
					success: function(data){
						table.ajax.reload( null, false ); 
					},
					error: function(jqXHR, textStatus, errorThrown) {
					  console.log(textStatus, errorThrown);
					}
				});
			};
		};

		function modal_add(){
			$('#form')[0].reset(); // reset form on modals
			method = "add";
			$('#myModal').modal('show');
			$('.modal-title').text('Add Person');
		}

		function edit_orang(id){
			console.log(id);
		};

		function add_orang(){
			if (method == "add") {
				url = "<?php echo site_url('crud/jax_add')?>";
			}else{
				url = "<?php echo site_url('crud/ajax_update') ?>"
			};

			$.ajax({
				url : url,
				type : "POST",
				data : $('#form').serialize(),
				dataType : "JSON",
				success: function(data){
					// console.log(data);
					$('#myModal').modal('hide');
					table.ajax.reload( null, false ); 
				},
				error: function(jqXHR, textStatus, errorThrown) {
				  console.log(textStatus, errorThrown);
				}
			});

		};

		function edit_orang(id){
			

			$.ajax({
				url : "<?php echo site_url('crud/jax_edit')?>?id="+id,
				type : "GET",
				dataType : "JSON",
				success: function(data){
		            $('#form')[0].reset(); // reset form on modals
					$('[name="id"]').val(data.id);
		            $('[name="first"]').val(data.firstName);
		            $('[name="last"]').val(data.lastName);
		            $('[name="gender"]').val(data.gender);
		            $('[name="address"]').val(data.address);	

					method = "edit";
					$('#myModal').modal('show');
					$('.modal-title').text('edit Person');

				},
				error: function(jqXHR, textStatus, errorThrown) {
				  console.log(textStatus, errorThrown);
				}
			});

		};
	</script>
</html>