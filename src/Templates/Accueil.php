<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Accueil</title>
</head>
<body>
    <h1>Accueil</h1>
    
    <h3>Créer un nouveau dossier de vacances :</h3>
    <!-- Bouton pour créer un dossier -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#folderModal">
      Créer un dossier
    </button>

    <!-- Modal -->
    <div class="modal fade" id="folderModal" tabindex="-1" aria-labelledby="folderModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="folderModalLabel">Créer un dossier</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="">
              <div class="mb-3">
                <label for="folderName" class="form-label">Nom du dossier</label>
                <input type="text" id="folderName" name="folderName" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div>
      <h3>Dossiers de vacances :</h3>
      <div class="container">
        <div class="row">
          <div class="col-md-4 d-flex align-items-start">
            <button class="btn btn-light">
              <div class="image-title">Vacances d'été</div>
              <img src="..\..\Media\picVacances.jpg" class="img-fluid" alt="Vacances">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIqLv48JhE40x0q8rfdoa6Zz9E1xa8mY5a0NENIltJ1yl5Is+Kz" crossorigin="anonymous"></script>
</body>
</html>
