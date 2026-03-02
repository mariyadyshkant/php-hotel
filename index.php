<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
</head>
<body>
    <h1>Hotels List</h1>
    <br>
    <form method="get">
        <div class="row justify-content-center">
            <div class="col-4">
                <select name="parcheggio" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option value="" selected>Cerco un hotel...</option>
                <option value="si">Con parcheggio</option>
                <option value="no">Senza parcheggio</option>
                </select>
            </div>
            <div class="col-4">
                <select name="stelle" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option value="" selected>Stelle</option>
                <option value="0">0 stelle</option>
                <option value="1">1 stella o superiore</option>
                <option value="2">2 stelle o superiore</option>
                <option value="3">3 stelle o superiore</option>
                <option value="4">4 stelle o superiore</option>
                <option value="5">5 stelle o superiore</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Cerca</button>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Azzera</button>
            </div>
        </div>
    </form>
    <br>
    <table class="table table-bordered">
        <thead class="thead-dark">
          <tr class="text-center">
            <th scope="col">Hotel</th>
            <th scope="col">Description</th>
            <th scope="col">Parking</th>
            <th scope="col">Vote</th>
            <th scope="col">Distance To Center</th>
        </tr>  
        </thead>
        <tbody>

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

        $hotelsFiltrati = $hotels;

        if (isset($_GET['parcheggio']) && $_GET['parcheggio'] != "") {
            $filtroParcheggio = $_GET['parcheggio'];
            $hotelsFiltrati = array_filter($hotelsFiltrati, function ($hotel) use ($filtroParcheggio) {
            if ($filtroParcheggio === "si") {
                return $hotel['parking'] === true;
            } elseif ($filtroParcheggio === "no") {
                return $hotel['parking'] === false;
            }
          }); 
        };
        

        if (isset($_GET['stelle']) && $_GET['stelle'] != "") {
            $filtroStelle = intval($_GET['stelle']);
            $hotelsFiltrati = array_filter($hotelsFiltrati, function($hotel) use ($filtroStelle) {
                    return $hotel['vote'] >= $filtroStelle;
                });
        };
               

        foreach ($hotelsFiltrati as $hotel) {
            echo "<tr class='text-center'>";
            foreach ($hotel as $a => $b) {
                if ($b === true) {
                   echo "<td>Yes</td>"; 
                } elseif ($b === false) {
                    echo "<td>No</td>"; 
                } elseif ($a === "distance_to_center") {
                    echo "<td>$b km</td>";
                }
                else {
                    echo "<td>$b</td>";
                }
                
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  
</body>
</html>
