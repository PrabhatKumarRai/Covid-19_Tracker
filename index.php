<?php

include 'includes/logic.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Covid 19 Cases Tracker</title>
    <style>
        .india-stats{
            position: fixed;
            right: 20px;
            bottom: 20px;
        }
        .table-responsive{
            height: 50vh;
            overflow-y: auto;
        }
        thead th{
            position: sticky;
            top: 0px;
            background: #000;
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-dark p-5 text-center text-light mb-3">
        <h1>Covid-19 Tracker</h1>
        <h5>This project keeps track of all the COVID-19 cases around the world.</h5>        
    </div>

    <!-- Go to India -->
    <a href="#Iceland" class="india-stats btn btn-primary">Go to India</a>

    <div class="container my-5">
        <div class="row text-center text-light">
            <div class="col-4 bg-info py-3">
                <h5>Confirmed</h5>
                <?= $total_confirmed; ?>
            </div>
            <div class="col-4 bg-success py-3">
                <h5>Recovered</h5>
                <?= $total_recovered; ?>
            </div>
            <div class="col-4 bg-danger py-3">
                <h5>Deceased</h5>
                <?= $total_deceased; ?>
            </div>
        </div>
    </div>

    <div class="container-fluid">            
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" >
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>Sr no.</th>
                            <th>Country</th>
                            <th>Confirmed</th>
                            <th>Increased</th>
                            <th>Recovered</th>
                            <th>Deceased</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            $i = 0; //for serial number
                            foreach($data as $key => $value){

                                $increase = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
                                $i++;
                        ?>

                            <tr class="<?php if($key == 'India'){ echo "bg-warning";} ?>" id="<?= $key ?>">
                                <td><?= $i; ?></td>
                                <th><?= $key;  ?></th>
                                <td>
                                    <?= $value[$days_count]['confirmed'];  ?>                                    
                                </td>
                                <td class="font-weight-bold">
                                    <?php  if($increase > 0){ ?>
                                        <span class="text-danger"> <?= $increase;  ?></span>
                                    <?php }else{ ?>
                                        <span class="text-success"> <?= $increase;  ?></span>
                                        <?php } ?>
                                </td>
                                <td class="text-success">
                                    <?= $value[$days_count]['recovered'];  ?>
                                </td>
                                <td class="font-weight-bold">
                                    <?php if($value[$days_count]['deaths'] > 0){ ?>
                                    <span class="text-danger"><?= $value[$days_count]['deaths'];  ?></span>
                                    <?php }else{ ?>
                                    <span class="text-success"><?= $value[$days_count]['deaths'];  ?></span>
                                    <?php } ?>
                                </td>
                            </tr>

                        <?php
                            }

                        ?>
                    </tbody>
                </table>
            </div>`
        </div>


</body>
</html>