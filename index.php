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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $filterHotel = [];

    foreach ($hotels as $hotel) {
        $voteFilter = $_GET['vote'] ?? '';
        $parkingFilter = isset($_GET['parking']) ? $_GET['parking'] : false;
        if (
            ($parkingFilter === false || $hotel['parking'] === $parkingFilter) &&
            (empty($voteFilter) || $hotel['vote'] == $voteFilter)
        ) {
            $filterHotel[] = $hotel;
        }
    }
} else {
    $filterHotel = $hotels;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="style.css">
    <title>PHP-Hotel</title>
</head>

<body>
    <h1>Lista HOTELBOOL</h1>

    <form method="GET">

        <div class="form-group">
            <label class="mb-1 .text-dark" for="vote">Voto recensione da 0 a 5</label>
            <input type="number" class="form-control" id="vote" name="vote" placeholder="Inserisci il voto recensione da 0 a 5">
        </div>
        <div class="form-group">
            <div class="form-check mt-4">
                <input class="form-check-input" type="checkbox" id="parking" name="parking" value="1">
                <label clas class="form-check-label" for="parking">Parcheggio disponibile</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Filtra</button>
    </form>





    <table class="table">
        <thead>
            <tr class="text-center ">
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filterHotel as $element) { ?>
                <tr class="text-center">
                    <td class="bg-warning"><?php echo $element['name'] ?></td>
                    <td class="bg-info"><?php echo $element['description'] ?></td>
                    <td class="bg-secondary"><?php echo $element['parking'] ? 'Disponibile' : 'Non disponibile' ?></td>
                    <td class="bg-danger-subtle"><?php echo  $element['vote'] ?></td>
                    <td class="bg-success"><?php echo $element['distance_to_center'] ?> km</td>
                <?php } ?>
                </tr>

        </tbody>
    </table>

</body>

</html>