<?php
    require_once 'database.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;

    $sql = "SELECT recipes.*, users.name AS user_name FROM recipes LEFT JOIN users ON recipes.user_id = users.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($recipes as $recipe) {
        echo "<div class='recipe'>";
        echo "<h3>" . htmlspecialchars($recipe['user_name']) . " - " . htmlspecialchars($recipe['name']) . "</h3>";
        echo "<p><strong>Ingrediencie:</strong> " . htmlspecialchars($recipe['ingredients']) . "</p>";
        echo "<p><strong>Popis:</strong> " . htmlspecialchars($recipe['description']) . "</p>";

        if ($user_id) {
            // Tlačidlo na editáciu
            echo "<form action='edit_recipe.php' method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='recipe_id' value='" . $recipe['id'] . "'>";
            echo "<input class='button-recipe' type='submit' value='Edit'>";
            echo "</form>";

            // Tlačidlo na mazanie (len pre admina alebo vlastníka receptu)
            if ($user_role === 'admin' || $recipe['user_id'] === $user_id) {
                echo "<form action='db/delete_recipe.php' method='POST' style='display:inline;' onsubmit='return confirm(\"Are you sure you want to delete this recipe?\");'>";
                echo "<input type='hidden' name='recipe_id' value='" . $recipe['id'] . "'>";
                echo "<input class='button-recipe' type='submit' value='Delete'>";
                echo "</form>";
            }
        }

        echo "</div>";
    }
?>