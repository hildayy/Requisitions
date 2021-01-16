<!DOCTYPE html>
<html>
<head>
	<title>Requisition Form</title>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Animate css-->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet"> 
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> 
    <style type="text/css">
     	h3,h1{
     		animation: bounce;
     		animation-duration: 2s;
     	}
     	h1.tittle{
     		font-family: 'Times New Roman', serif;
     		margin-top: 30px;
     		margin-left: 100px;
     		font-size: 50px;
     	}
     	form{
     		margin-top: 50px;
     		margin-right: 100px;
     		margin-left: 50px;
     		margin-bottom: 100px;
     		animation-delay: 0.5s;
     	}
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 
    crossorigin="anonymous"></script>

 
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   
</head>
<body>
	<div class="row">
		<div class="col-md-3">
			<img src="https://speedballcourier.com/wp-content/uploads/2018/05/logo-white.png" height="150" width="150" style="    margin-left: 30px;" alt="Speedball courier services" aria-describedby="imageDesc">
			<small id="imageDesc" class="form-text text-muted" style="margin-left: 40px;">COURIER SERVICE</small>
		</div>
		<div class="col-md 9">
			<h1 class="tittle">REQUISITION FORM</h1>
		</div>
	</div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
     @endif
	
	<form action="{{route('store')}}" id="requisitionForm" name="requisitionForm" method="post" autocomplete="off">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-4">
				<div class=" form-group">
					<label for ="date">Date</label>
					<input type="date" class="form-control" name="Date">
				</div>
			</div>
			<div class="col-md-4"></div>

			<div class="col-md-4">
				<div class=" form-group">
						<label><a href="/index2">View requisitions</a></label>
						
				</div>
			</div>
	    </div>

	    <H5>Requisiter Info.</H5>
	    <div class="row">	
			<div class="col-md-4">
				<div class=" form-group">
					<label for ="name">Name</label>
					<input type="text" class="form-control" name="name">
				</div>
			</div>

			<div class="col-md-4">
				<div class=" form-group">
					<label for ="name">Department</label>
					<select class="custom-select" name="department">
						<option>Select One</option>
						<option>Business Development</option>
						<option>Customer Service/Call Center</option>
						<option>Finance</option>
						<option>I.T</option>
						<option>Operations</option>
						<option>Warehouse</option>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class=" form-group">
					<label for ="email">Email</label>
					<input type="email"class="form-control" name="email">
				</div>
			</div>	
		</div>	
		<h5>Recommended Vendor Info.</h5>	
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for ="VendorName">Vendor Name</label>
					<input type="text" class="form-control" name="vendor_name">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for ="VendorAddress">Vendor Address</label>
					<input type="text" class="form-control" name="vendor_address">
				</div>
			</div>	
			<div class="col-md-4">
				<div class="form-group">
					<label for ="VendorPhone">Vendor Phone Number</label>
					<input type="tel" class="form-control" name="vendor_phone">
				</div>
			</div>				
		</div>
		<h5>Materials required</h5>
		<div class="table-responsive-md">
		<table class="table table-bordered table-sm" id="materialsTable">
			<thead>
				<tr>
				 <th scope="col-md-3">Item</th>
				 <th scope="col-md-4">Description & Size</th>
				 <th scope="col-md-1">Qty</th>
				 <th scope="col-md-1">Cost</th>
				 <th scope="col-md-2">Total</th>
				 <th scope="col-md 1"></th>	
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<input type="text" name="Item[]">
					</td>
					<td>
						<input type="text" name="description[]">
					</td>
					<td>
						<input type="number" name="quantity[]"class="quantity">
					</td>
					<td>
						<input type="number" name="cost[]" class="cost">
					</td>
					<td>
						<input type="number" name="total[]" class="total">
					</td>
					<td>
		 				<button type="button" class="btn btn-sm btn-danger servicedeletebtn">
                        <i class="fa fa-trash"></i>
                       </button>
					</td>
				</tr>
			</tbody>
			<tfoot>
			 <td></td>
			 <td></td>
			 <td></td>
			 <td>TOTAL</td>
			 <td><b class="totals"></b></td>

			</tfoot>
		</table>
	</div>
	<input type="button" class="addRow btn btn-info" value="Add More">
	<div class="row" style="margin-top: 30px;">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="g-recaptcha" data-sitekey="6LfbtyIaAAAAAGd3MLJI6CtCocLo29P06M1Gil3o"></div>
		</div>
		<div class="col-md-4"></div>
		<!--<div class="g-recaptcha" data-sitekey="6LfbtyIaAAAAAGd3MLJI6CtCocLo29P06M1Gil3o"></div>-->
	</div>

	<div class="row" style="align-items: center; margin: 30px">
		<div class="col">
			<input class="btn btn-warning" value="Cancel" type="reset">
		</div>
			
		<div class="col">
			<input type="submit" class="btn btn-success" value="Submit">
		</div>
			
			
	</div>
	</form>
	<script>
		$(document).ready(function() {
			$('tbody').on('click','.servicedeletebtn',function(e)
			{ 	
				e.preventDefault();
				swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this requisition!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						
							$(this).parent().parent().remove();
					
						swal("Poof! Your imaginary file has been deleted!", {
						icon: "success",
						});
					} else {
						swal("Your requsition is safe!");
					}
					});
			});
		});
		$('.addRow').on('click',function()
		{
		 addRow();
		});
		function addRow()
		{
			var tr='<tr>'+
					'<td>'+
						'<input type="text" name="Item[]">'+
					'</td>'+
					'<td>'+
						'<input type="text" name="description[]">'+
					'</td>'+
					'<td>'+
						'<input type="number" name="quantity[]" class="quantity">'+
					'</td>'+
					'<td>'+
						'<input type="number" name="cost[]" class="cost">'+
					'</td>'+
					'<td>'+
						'<input type="number" name="total[]" class="total">'+
					'</td>'+
					'<td>'+
		 				'<button type="button" class="btn btn-sm btn-danger servicedeletebtn">'+
                       '<i class="fa fa-trash"></i>'+
                       '</button>'+
					'</td>'+
				'</tr>';
				$('tbody').append(tr);
		};
		$('tbody').delegate('.quantity,.cost','keyup',function()
		{
			var tr=$(this).parent().parent();
			var quantity=tr.find('.quantity').val();
			var cost=tr.find('.cost').val();
			var total=(quantity*cost);
			tr.find('.total').val(total);
			totals();
		});
		function totals()
		{
			var totals=0;
			$('.total').each(function (i,e)
			{
				var total=$(this).val()-0;
				totals +=total;
			});
			$('.totals').html(totals);
		}



	</script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--<script src="script.js"></script>-->
</body>

</html>