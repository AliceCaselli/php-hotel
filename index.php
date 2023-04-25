<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Hotels</title>
</head>
<body>

    
<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $isParkingRequired = $_GET['isParkingRequired'] ?? false;

    $minimumVoteRequired = $_GET['vote'] ?? 0;


    if($isParkingRequired == 'on') {
        $isParkingRequired = true;
    }


    //array filtro
    $filteredHotels = $hotels;


    if($isParkingRequired) {

        $tempFilteredHotels = [];

        foreach($hotels as $singleHotel) {

            if($singleHotel['parking'] == true) {
                $tempFilteredHotels[] = $singleHotel;
            }
        }

        $filteredHotels = $tempFilteredHotels;
    }


    if($minimumVoteRequired > 0) {

        $tempFilteredHotels = [];
    
        foreach($filteredHotels as $singleFilteredHotel) {
    
        if($singleFilteredHotel['vote'] >= $minimumVoteRequired) {
    
            $tempFilteredHotels[] = $singleFilteredHotel;
    
            }
    
        }
    
        $filteredHotels = $tempFilteredHotels;
    }
  

?>

<table class="table">
  <thead>
    <tr>
        <?php 
        
        foreach($hotels[0] as $key => $value) {

            ?>

                <th scope="col"><?php echo $key ?></th>

            <?php
        }

        ?>

    </tr>
  </thead>
  <tbody>

  <form action="index.php" method="GET">
    <div class="d-flex justify-content-center gap-2 my-5">

        
        <input name="isParkingRequired" type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
        <label class="btn btn-outline-primary" for="btn-check-outlined">Parking</label><br>
        
        <button class="btn btn-success" type="submit">Filtra</button>
        
    </div>

    <div class="d-flex justify-content-center gap-2 my-5">
        <label for="vote" class="form-label">Voto minimo</label>
        <input name="vote" type="number" min="1" max="5" id="vote" step="1">
    </div>


</form>
    
  <?php 
  
        // foreach( $hotels as $hotel) {

            foreach($filteredHotels as $singleHotel) {

            ?>

            <tr>

            <?php

                foreach( $singleHotel as $hotelInfoKey => $hotelInfoValue) {

                    if($hotelInfoKey == 'parking'){

                        if($hotelInfoValue == true){

                            echo "<td>Si</td>";

                        } else {

                            echo "<td>No</td>";

                        }
                    } else {

                        echo "<td>{$hotelInfoValue}</td>";
    
                    }

                } 

                ?>
                </tr>

                <?php

        }
  
  ?>
    
  </tbody>

 

  
  
</table>




<!-- Bootstrap link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>