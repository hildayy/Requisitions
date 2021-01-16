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
   <script>
       
 </script>   
   
</head>
<body>
    <h1> REQUISITIONS MADE</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Item</th>
                <th>Description</th>
                <th>Qty</th>
                <th>Cost</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requisitions as $key=>$products)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$products->Item}}</td>
                    <td>{{$products->description}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>{{$products->cost}}</td>
                    <td class="amount">{{$products->total}}</td>
                </tr>                
            @endforeach 
                     
        </tbody>
        <tfoot>
        <tr>
            <td><button class="btn btn-danger">Disapprove</button></td>
            <td><button class="btn btn-success">Approve</button></td>                
        </tr>
        </tfoot>
    </table>
 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>