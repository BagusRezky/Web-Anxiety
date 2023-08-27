<?php
session_start();
?>

<?php
$anxiety_suggestions = [
    "General Anxiety Disorder" => "Coba luangkan waktu untuk meditasi dan relaksasi.",
    "Panic Disorder" => "Latihan pernapasan dalam dapat membantu mengurangi serangan panik.",
    "Social Anxiety Disorder" => "Mulailah bertemu orang-orang dalam situasi yang nyaman dan perlahan-lahan keluar dari zona nyaman Anda.",
    "Specific Phobia" => "Terapi eksposur dapat membantu Anda menghadapi rasa takut secara bertahap.",
    "Obsessive Compulsive Disorder" => "Cari dukungan dari terapis yang berpengalaman dalam mengatasi OCD.",
    "Post Traumatic Stress Disorder" => "Terapi trauma dapat membantu Anda mengatasi dampak pengalaman traumatis."
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Survey"/>
    <meta name="author" content="Ansonika"/>
    <title>Survey Result</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="background-color: #f8f9fa;">
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card shadow-lg">
                <img src="https://static.vecteezy.com/system/resources/previews/016/389/975/original/overthinking-and-anxiety-free-png.png" alt="" class="d-flex justify-content-center align-items-center w-100 card-img-top img-fluid" style="max-height: 200px; max-width: 200px;"/>
                <div class="card-body">
                    <h2 class="card-title">Survey Result</h2>
                    <p class="card-text">
                        Berikut adalah hasil survey tingkat kecemasan Anda:
                    </p>
                    <?php
                    $predicted_class = json_decode($_GET["predicted_class"], true)["predicted_class"];
                    $anxiety_types = [
                        "General Anxiety Disorder",
                        "Panic Disorder",
                        "Social Anxiety Disorder",
                        "Specific Phobia",
                        "Obsessive Compulsive Disorder",
                        "Post Traumatic Stress Disorder",
                    ];
                    ?>
                    <table class="table table-bordered table-striped" style="background-color: white;">
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Hasil</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Nama</td>
                            <td><?php echo $_SESSION["firstname"]; ?></td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td><?php echo $_SESSION["age"]; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?php echo $_SESSION["gender"]; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Anxiety</td>
                            <td><?php echo $anxiety_types[$predicted_class]; ?></td>
                        </tr>
                        <tr>
                            <td>Saran</td>
                            <td><?php echo $anxiety_suggestions[$anxiety_types[$predicted_class]]; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>
</html>
