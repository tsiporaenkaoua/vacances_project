<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Journal de Vacances</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Journal de Vacances</h2>
        <form>
            <!-- Date avec sélection du calendrier -->
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" id="date" name="date" class="form-control" value="<?= date('Y-m-d'); ?>">
            </div>

            <!-- Ambiance -->
            <div class="form-group">
                <label for="ambiance">Ambiance :</label>
                <textarea id="ambiance" name="ambiance" class="form-control" rows="3" placeholder="Décrire l'ambiance..."></textarea>
            </div>

            <!-- Météo avec emojis -->
            <div class="form-group">
                <label for="meteo">Météo :</label>
                <div>
                    <label><input type="radio" name="meteo" value="☀️"> ☀️ Soleil</label>
                    <label><input type="radio" name="meteo" value="⛅"> ⛅ Nuageux</label>
                    <label><input type="radio" name="meteo" value="🌧️"> 🌧️ Pluie</label>
                    <label><input type="radio" name="meteo" value="❄️"> ❄️ Neige</label>
                </div>
            </div>

            <!-- Itinéraire -->
            <div class="form-group">
                <label for="itineraire">Itinéraire :</label>
                <textarea id="itineraire" name="itineraire" class="form-control" rows="3" placeholder="Décrire l'itinéraire..."></textarea>
            </div>

            <!-- Programme de la journée -->
            <div class="form-group">
                <label for="programme">Programme de la journée :</label>
                <textarea id="programme" name="programme" class="form-control" rows="3" placeholder="Décrire le programme de la journée..."></textarea>
            </div>

            <!-- Anecdotes -->
            <div class="form-group">
                <label for="anecdotes">Anecdotes :</label>
                <textarea id="anecdotes" name="anecdotes" class="form-control" rows="3" placeholder="Partagez une anecdote..."></textarea>
            </div>

            <!-- Ce que vous avez mangé -->
            <div class="form-group">
                <label for="mange">Ce que j'ai mangé :</label>
                <textarea id="mange" name="mange" class="form-control" rows="3" placeholder="Décrire ce que vous avez mangé..."></textarea>
            </div>

            <!-- Ce que vous avez appris -->
            <div class="form-group">
                <label for="appris">Ce que j'ai appris :</label>
                <textarea id="appris" name="appris" class="form-control" rows="3" placeholder="Décrire ce que vous avez appris..."></textarea>
            </div>

            <!-- Upload photos -->
            <div class="form-group">
                <label for="photos">Photos :</label>
                <input type="file" id="photos" name="photos" class="form-control-file" multiple>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>

    <script>
        // Pour définir la date par défaut à celle du jour
        document.getElementById('date').value = new Date().toISOString().split('T')[0];
    </script>
</body>
</html>
