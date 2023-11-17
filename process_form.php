<?php

$servername = "votre_serveur";
$username = "votre_nom_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "votre_base_de_donnees";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$numAddresses = isset($_POST['numAddresses']) ? intval($_POST['numAddresses']) : 0;


echo '<div class="container">';
echo '<form action="process_data.php" method="post">';

for ($i = 1; $i <= $numAddresses; $i++) {
    echo '<div class="address-field">';
    echo '<label for="street'.$i.'">Street:</label>';
    echo '<input type="text" name="street'.$i.'" maxlength="50" required>';

    echo '<label for="streetNb'.$i.'">Street Number:</label>';
    echo '<input type="number" name="streetNb'.$i.'" required>';

    echo '<label for="type'.$i.'">Type:</label>';
    echo '<select name="type'.$i.'" maxlength="20">';
    echo '<option value="livraison">Livraison</option>';
    echo '<option value="facturation">Facturation</option>';
    echo '<option value="autre">Autre</option>';
    echo '</select>';

    echo '<label for="city'.$i.'">City:</label>';
    echo '<select name="city'.$i.'">';
    echo '<option value="Montreal">Montreal</option>';
    echo '<option value="Laval">Laval</option>';
    echo '<option value="Toronto">Toronto</option>';
    echo '<option value="Quebec">Quebec</option>';
    echo '</select>';

    echo '<label for="zipcode'.$i.'">Zip Code:</label>';
    echo '<input type="text" name="zipcode'.$i.'" maxlength="6" required>';

    echo '</div>';
}

echo '<button type="submit">Soumettre</button>';
echo '</form>';
echo '</div>';

$conn->close();


echo '<div class="container">';
echo '<h2>Adresse(s) saisie(s)</h2>';
echo '<ul>';

foreach ($_POST as $key => $value) {
    echo '<li><strong>'.$key.':</strong> '.$value.'</li>';
}

echo '</ul>';
echo '<form action="index.html">';
echo '<button type="submit">Retour</button>';
echo '</form>';
echo '</div>';

?>