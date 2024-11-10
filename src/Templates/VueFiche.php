<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la journée de vacances</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container my-5">
    <h1 class="mb-4 text-center">Détails de la journée de vacances</h1>

    <div class="card shadow-sm p-4 mb-4">
        <h2 class="card-title"><?php echo htmlspecialchars($details['name'] ?? ''); ?></h2>
        <p class="text-muted"><?php echo htmlspecialchars($details['date'] ?? ''); ?></p>
        
        <hr>

        <div class="mb-3">
            <h5 class="fw-bold">Météo</h5>
            <p><?php echo htmlspecialchars($details['weather'] ?? ''); ?></p>
        </div>

        <div class="mb-3">
            <h5 class="fw-bold">Itinéraire</h5>
            <p><?php echo htmlspecialchars($details['itinerary'] ?? ''); ?></p>
        </div>

        <div class="mb-3">
            <h5 class="fw-bold">Programme de la journée</h5>
            <p><?php echo nl2br(htmlspecialchars($details['program'] ?? '')); ?></p>
        </div>

        <div class="mb-3">
            <h5 class="fw-bold">Anecdote</h5>
            <p><?php echo htmlspecialchars($details['anecdote'] ?? ''); ?></p>
        </div>

        <div class="mb-3">
            <h5 class="fw-bold">Repas</h5>
            <p><?php echo htmlspecialchars($details['meal'] ?? ''); ?></p>
        </div>

        <div class="mb-3">
            <h5 class="fw-bold">Leçon apprise</h5>
            <p><?php echo htmlspecialchars($details['learned'] ?? ''); ?></p>
        </div>

        <div class="mb-3">
            <h5 class="fw-bold">Ambiance</h5>
            <p><?php echo htmlspecialchars($details['atmosphere'] ?? ''); ?></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-W6E1B02QJmXZFx0H2LDpDFeyjq8jwctQjpp60D8tVn2uZG+fWWD2bqPf9jxmq7IC" crossorigin="anonymous"></script>
</body>
</html>
