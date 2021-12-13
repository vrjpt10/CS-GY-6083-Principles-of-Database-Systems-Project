<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Passenger Details</h2>
                        <a href="http://localhost/Website/Passenger_details/index.html" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Passenger</a>
                        
                    </div>
                    
                    <?php
                    // Include config file
                    require_once "config.php";
                    session_start();
                    // Attempt select query execution
                    $sql = "SELECT pas.pid as PID, pas.pfname as pfname, ins.IPNAME as ipname, ins.IPCOST as ipcost, book.arrairport as arrairport, book.depairport as depairport FROM JBVR_Passenger pas JOIN JBVR_BookingDetails book ON pas.BOOKINGID = book.BOOKINGID JOIN Registration reg ON book.CID = reg.fldCID JOIN JBVR_InsurancePlans ins ON ins.InsID = pas.INSID Where reg.fldCID = '".$_SESSION['cid']."' and book.BOOKINGID = '".$_SESSION['BOOKINGID']."'";
                    //$sql= "SELECT pas.PFNAME as First_Name, pas.PMNAME as Middle_Name, pas.PLNAME as Last_Name, book.ArrAirport as Arrival_Airport, book.DepAirport as Departure_Airport, ins.IPNAME as Insurance_Plan, ins.IPCOST as Cost FROM JBVR_Passenger pas JOIN JBVR_BookingDetails book ON pas.BOOKINGID=book.BOOKINGID JOIN JBVR_InsurancePlans ins ON pas.INSID=ins.InsID JOIN Registration reg on book.CID=reg.fldCID WHERE (pas.BOOKINGID=book.BOOKINGID) and reg.fldCID = '".$_SESSION['cid']."' and book.BOOKINGID = '".$_SESSION['BOOKINGID']."'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<div class="mt-5 mb-3 clearfix">';
                        echo '<a href="http://localhost/Website/Invoice/connect_Invoice.php" class="btn btn-primary pull-right"> Proceed to payment</a>';
                        echo '</div>';
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Sl No</th>";
                                        echo "<th>Passenger Name</th>";
                                        echo "<th>Arrival Airport</th>";
                                        echo "<th>Departure Airport</th>";
                                        echo "<th>Insurance Plan</th>";
                                        echo "<th>Insurance Cost</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $count = 0;
                                while($row = mysqli_fetch_array($result)){
                                    $count += 1;
                                    echo "<tr>";
                                        echo "<td>" . $count. "</td>";
                                        echo "<td>" . $row['pfname'] . "</td>";
                                        echo "<td>" . $row['arrairport'] . "</td>";
                                        echo "<td>" . $row['depairport'] . "</td>";
                                        echo "<td>" . $row['ipname'] . "</td>";
                                        echo "<td>" . $row['ipcost'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="delete.php?PID='. $row['PID'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No passenger records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>  
            </div>        
        </div>
    </div>
    
</body>
</html>