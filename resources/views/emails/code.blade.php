<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des notes</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body>
    <?php
        $code=rand(100000,999999);
        session()->put('code', $code);
    ?>
    <h1>Votre numero est: {{$code}}</h1>
</body>