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
            <form method="post" action="/index.php?action=CreateFolder">
              <div class="mb-3">
                <label for="folderName" class="form-label">Nom du dossier</label>
                <input type="text" id="folderName" name="folderName" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
            <?php if (isset($error)) : ?>
            <div style="color: red;"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    

  
    <div>
      <h3>Dossiers de vacances :</h3>
      

     

      <div class="container">
    <div class="row">
        <div class="col-md-4 d-flex align-items-start">
            <ol>
                <?php if (!empty($dossiers)) : ?>
                    <?php foreach ($dossiers as $dossier) : ?>
                        <li>
                          <?php echo htmlspecialchars($dossier['name']); ?>
                          <a href="..\..\index.php?action=ShowFiles&idDossier=<?php echo urlencode($dossier['idDossier']);?>">
                          <img src="..\..\Media\picVacances.jpg" class="img-fluid" alt="Vacances">
                          </a>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div>Créez votre premier dossier de vacances !</div>
                <?php endif; ?>
            </ol>
        </div>
    </div>
</div>

    </div>

    <!-- JS de Bootstrap utile pour le modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
