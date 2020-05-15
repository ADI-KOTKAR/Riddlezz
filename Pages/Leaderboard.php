<?php
    require_once '../Database/connStatus.php';

    if(!is_connected()){
    include '../Components/internetError.php';

    return ;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riddlezz_Leaderboard</title>
</head>
<body>
    
    <!--Header-->
    <?php include '../Components/header.php'; ?>

    <div class="card mx-auto mt-5 w-75 bg-light" style="margin-bottom:10%">
        <h1 class="mx-5 my-5 ">Leaderboard</h1>
        <div style="overflow:scroll;">
            <table class="table table-striped mx-auto text-white table-dark" style="width:85%">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email ID</th>
                    <th scope="col">Score</th>
                    <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        require '../Database/Database.php';

                        $cursor = sortLeaderboard();
                        $i=0;
                        
                        foreach ($cursor as $state) {
                            $time_taken = $state['time_end'] - $state['time_start'];
                            $i++;

                            if($time_taken == 0){
                                print"<tr>
                                    <th scope=\"row\">$i</th>
                                    <td>".$state['email']."</td>
                                    <td>".$state['points']."</td>
                                    <td> NA  </td>
                                </tr>";
                            }else{
                                $time =  getHoursMinutes($time_taken);
    
                                print"<tr>
                                        <th scope=\"row\">$i</th>
                                        <td>".$state['email']."</td>
                                        <td>".$state['points']."</td>
                                        <td>".$time."</td>
                                    </tr>";
                            }

                        }
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--Footer-->   
    <?php include '../Components/footer.php'; ?>

</body>
</html>