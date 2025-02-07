<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/stylesheets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>404 Page Not Found</title>
</head>

<body class="centered-404">
    <main class="container-404">
        <h1><i class="fa-solid fa-triangle-exclamation rouge"></i> Nouveau message reçu <i
                class="fa-solid fa-triangle-exclamation rouge"></i></h1>
        <div class="message-404">
            <h2>Erreur 404 : Page non trouvée</h2>
            <div class="url-404">Page recherché :
                <?php
                $currentUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                $parsedUrl = parse_url($currentUrl);
                $path = $parsedUrl['path'];

                $maxLength = 20;

                if (strlen($path) > $maxLength) {
                    $segments = explode('/', trim($path, '/'));
                    $lastSegment = end($segments);
                    $truncatedPath = substr($path, 0, $maxLength - strlen($lastSegment) - 3) . '...';
                } else {
                    $truncatedPath = $path;
                }

                echo $truncatedPath;
                ?>

            </div>
            <p>Nous sommes désolés mais la page que vous recherchez n'existe pas. Veuillez vérifier l'URL ou consulter
                notre <a href="/">accueil</a>.</p>
        </div>
    </main>
</body>

</html>