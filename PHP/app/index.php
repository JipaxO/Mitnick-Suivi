<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaires Exos</title>
</head>

<body>
    <form action="./data_control.php" method="post">
        <div class="name_input">
            <label for="name">Quel est ton nom ? </label>
            <input type="text" name="name" id="name">
        </div>
        <div class="age_input">
            <label for="age">Ta date de naissance ?:</label>
            <input type="date" name="age" id="age">
        </div>
        <div class="artist_pref">
            <label>Tu préfères Andy Warhol ou Basquiat ? :</label>
            <br>
            <input type="radio" name="artist_pref" id="warhol" value="warhol">
            <label for="warhol">Andy Warhol</label>
            <input type="radio" name="artist_pref" id="basquiat" value="basquiat">
            <label for="basquiat">Basquiat</label>
        </div>
        <div class="life">
            <label for="life">Parle-moi de toi :</label>
            <textarea name="life" id="life" rows="4" cols="50"></textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>

</body>

</html>