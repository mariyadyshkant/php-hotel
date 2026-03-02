<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels List</title>
</head>
<body>
    <h1>Hotels List</h1>
    <table>
        <tr>
            <th>Hotel</th>
            <th>Descriprion</th>
            <th>Parking</th>
            <th>Vote</th>
            <th>Distance To Center</th>
        </tr>
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


        foreach ($hotels as $hotel) {
            echo "<tr>";
            foreach ($hotel as $a => $b) {
                if ($b === true) {
                   echo "<td>Yes</td>"; 
                } elseif ($b === false) {
                    echo "<td>No</td>"; 
                } else {
                    echo "<td>$b</td>";
                }
                
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
