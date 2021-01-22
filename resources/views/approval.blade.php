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
     	h3.tittle{
     		font-family: 'Times New Roman', serif;
            text-align: center;
     	}
     	form{
     		margin-top: 50px;
     		margin-right: 100px;
     		margin-left: 50px;
     		margin-bottom: 100px;
     		animation-delay: 0.5s;
     	}
        .red {
            background-color: #ec5555;
        }
        
        .green {
            background-color: #99e8ac;
        }
        .yellow{
            background-color: #F8F121;
        }
        .center {
           display: block; 

        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 
    crossorigin="anonymous"></script> 
    
</head>
<body>


    <div class="d-sm-flex align-items-center mb-4">
       <img src="https://mftfulfillmentcentre.com/images/logo.png"/>
       <div class="justify-content-between" style="margin-left: 30px;">
          <h1 class="h1 mb-0 text-gray-800">REQUISITIONS</h1>
       </div>
        

    </div>


    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4"> 
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div  class="col-mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Approved Requisitions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                                <?php
                                    $connection=mysqli_connect("localhost","root","","requisition_test");

                                    $query="SELECT * FROM `forms` WHERE feedback='approved'";
                                    $query_run=mysqli_query($connection,$query);
                                    $row=mysqli_num_rows($query_run);
                                    echo '<h1>'.$row.'</h1>'
                                ?>
                            </div>
                        </div>      
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4"> 
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div  class="col-mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Declined Requisitions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                                <?php
                                    $connection=mysqli_connect("localhost","root","","requisition_test");

                                    $query="SELECT * FROM `forms` WHERE feedback='Disapproved'";
                                    $query_run=mysqli_query($connection,$query);
                                    $row=mysqli_num_rows($query_run);
                                    echo '<h1>'.$row.'</h1>'
                                ?>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4"> 
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div  class="col-mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requisitions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                                <?php
                                    $connection=mysqli_connect("localhost","root","","requisition_test");

                                    $query="SELECT * FROM `forms` WHERE feedback='Pending'";
                                    $query_run=mysqli_query($connection,$query);
                                    $row=mysqli_num_rows($query_run);
                                    echo '<h1>'.$row.'</h1>'
                                ?>
                            </div>
                        </div>   
                          
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4"> 
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div  class="col-mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Requisitions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                                <?php
                                    $connection=mysqli_connect("localhost","root","","requisition_test");

                                    $query="SELECT * FROM `forms`";
                                    $query_run=mysqli_query($connection,$query);
                                    $row=mysqli_num_rows($query_run);
                                    echo '<h1>'.$row.'</h1>'
                                ?>
                            </div>
                        </div>   
                          
                    </div>
                </div>
            </div>
        </div>



    </div>
 
    
    
    <table class="table table-bordered" id="requisition" >
        <thead>
            <tr>
                <th>No.</th>
                <th>Employee Name</th>
                <th>Employee Department</th>
                <th>Employee Email</th>
                <th>Req. Id</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
         @foreach($forms as $key=>$data)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->department}}</td>
                <td>{{$data->email}}</td>
                <td><a href="/requisitions/{{$data->id}}">{{$data->id}}</a></td>  

                @if($data->feedback=="Disapproved")       
               <td class ="feedback red">{{$data->feedback}}</td>  
               @elseif($data->feedback=="approved"||$data->feedback=="Approved") 
               <td class ="feedback green">{{$data->feedback}}</td>  
               @else
               <td class ="feedback yellow">{{$data->feedback}}</td>  
              @endif
            </tr>
          @endforeach              
        </tbody>
    </table>
    
   
    


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

    
</body>
</html>