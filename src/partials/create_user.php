<?php require __DIR__ . '/../config/db.php'; ?>
<?php require __DIR__ . '/head.php'; ?>
<?php require __DIR__ . '/header.php'; ?>

<?php
$success = false; //Permet d'afficher le message de succès quand il passe à true
$errors = []; //Permet de stocker les messages d'erreurs

//Vérifie si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST'){ //Si la méthode de la requête est POST
  $name = trim($_POST['name'] ?? ''); //Récupère le nom et supprime les espaces inutiles sinon une chaîne vide
  $email = trim($_POST['email'] ?? ''); //Récupère l'email et supprime les espaces inutiles sinon une chaîne vide

  if ($name === ''){ //Si le nom est vide
    $errors[] = "Le nom est obligatoire."; //Ajoute un message d'erreur au tableau
  }
  if ($email === ''){ //Si l'email est vide
    $errors[] = "L'email est obligatoire."; //Ajoute un message d'erreur au tableau
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ //Sinon si l'email n'est pas valide
    $errors[] = "L'email n'est pas valide."; //Ajoute un message d'erreur au tableau
  }

  if(!$errors){ //Si le tableau d'erreurs est vide
    $sqlQuery = 'INSERT INTO users (name, email) VALUES (:name, :email)'; //Requête d'insertion
    $insertUser = $sqlClient->prepare($sqlQuery); //Prépare la requête
    $ok =$insertUser->execute(['name' => $name, 'email' => $email]); //Exécute la requête avec les valeurs
    if ($ok){
      $success = true; //Passe la variable de succès à true
    } else {
      $errors[] = "Une erreur est survenue lors de l'enregistrement."; //Ajoute un message d'erreur au tableau
    }
}

}

?>

<main class="mx-auto max-w-5xl px-4 py-10">
  <h1 class="text-2xl font-semibold">Ajouter un utilisateur</h1>
    <?php if ($success): ?>
    <div class="mt-4 rounded-lg border border-green-200 bg-green-50 p-3 text-green-800">
      Utilisateur ajouté avec succès. <a class="underline" href="./users.php">Voir la liste</a>
    </div>
  <?php endif; ?>

  <?php if ($errors): ?>
    <div class="mt-4 rounded-lg border border-red-200 bg-red-50 p-3 text-red-800">
      <ul class="list-disc pl-5">
        <?php foreach ($errors as $e): ?>
          <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
  <form method="post" action="" class="mt-6 max-w-md space-y-4">
    <div>
      <label class="block text-sm font-medium">Nom</label>
      <input name="name" class="mt-1 w-full rounded border px-3 py-2" required />
    </div>
    <div>
      <label class="block text-sm font-medium">Email</label>
      <input name="email" type="email" class="mt-1 w-full rounded border px-3 py-2" required />
    </div>
    <button class="mt-2 rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">
      Enregistrer
    </button>
  </form>
</main>

</body>
</html>