<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Contenu dossier</title>
</head>
<body>
    <h1>Dossier : <?php echo htmlspecialchars($nameDossier) ?></h1>
    
    <h3>Créer une nouvelle fiche de vacances :</h3>
    <!-- Bouton pour créer un dossier -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#folderModal">
      <a href="src\Templates\CreationFiche.php" style="text-decoration:none; color:#faf5f4">Créer une fiche </a>
    </button>

  
    <div>
      <h3>Toutes mes fiches :</h3>
      

     

      <div class="container">
    <div class="row">
        <div class="col-md-4 d-flex align-items-start">
            <ol>
                <?php if (!empty($fiches)) : ?>
                    <?php foreach ($fiches as $fiche) : ?>
                        <li>
                            <?php echo htmlspecialchars($fiche['name']); ?>
                            <a href="..\..\index.php?action=ShowFileDetails&idFiche=<?php echo urlencode($fiche['idFiche']);?>"> 
                                <img src="..\..\Media\picVacances.jpg" class="img-fluid" alt="Vacances">
                                </a>
                            
                        </li>
<?php endforeach; ?>
                    
                <?php else : ?>
                    <div>Créez votre premiere fiche de vacances!</div>
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
