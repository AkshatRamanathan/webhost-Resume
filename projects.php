<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akshat Ramanathan's Projects</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Projects</h1>
        <p>Here are some of my projects. You can find more on my <a href="https://github.com/AkshatRamanathan" target="_blank">GitHub</a>.</p>
    </header>
    <nav>
        <a href="/">Home</a>
        <a href="projects.php">Projects</a>
        <a href="test.php">Test PHP</a>
    </nav>
    <main>
        <?php
        $githubUsername = 'AkshatRamanathan'; // Replace with your GitHub username
        $apiUrl = "https://api.github.com/users/$githubUsername/repos";
        $opts = [
            'http' => [
                'method' => 'GET',
                'header' => [
                    'User-Agent: PHP'
                ]
            ]
        ];
        $context = stream_context_create($opts);
        $response = file_get_contents($apiUrl, false, $context);
        $repos = json_decode($response, true);

        if (!empty($repos)) {
            echo '<ul>';
            foreach ($repos as $repo) {
                echo '<li><a href="' . $repo['html_url'] . '" target="_blank">' . $repo['name'] . '</a>: ' . $repo['description'] . '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No projects found.</p>';
        }
        ?>
    </main>
    <footer>
        <p>Connect with me on <a href="https://github.com/AkshatRamanathan" target="_blank">GitHub</a></p>
    </footer>
</body>

</html>