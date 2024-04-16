<header class="container main-header">
    <div>
        <a href="index.php">
        <img src="img/logo.png" height="40">
        </a>
    </div>
    <nav class="main-nav">
        <ul class="main-menu" id="main-menu">
            <?php
            $navData = json_decode(file_get_contents('database/navbardata.json'), true);
            foreach ($navData as $item) {
                echo "<li><a href='" . $item['link'] . "'>" . $item['label'] . "</a></li>";
            }
            ?>
            <li id="dark-mode-toggle-li">
                <button id="dark-mode-toggle" class="modes-button">Dark Mode</button>
            </li>
        </ul>
        <a class="hamburger" id="hamburger">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>
