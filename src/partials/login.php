<?php
require __DIR__ . '/../config/session.php';
require __DIR__ . '/../config/db.php';

// Variables
$email = trim($_POST['email'] ?? ''); // Récupère l'email du formulaire, ou une chaîne vide si non défini
$password = $_POST['password'] ?? ''; // Récupère le mot de passe du formulaire, ou une chaîne vide si non défini
$errors = []; // Initialise un tableau pour stocker les messages d'erreur

// Vérifie si déjà connecté
if (!empty($_SESSION['user'])) {
    header('Location: ./index.php'); // Redirige vers la page d'accueil si déjà connecté
    exit;
}

// Traite le formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($email === "") {
    $errors[] = 'L\'email est requis.'; // Ajoute un message d'erreur si l'email est vide
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'L\'email est invalide.'; // Ajoute un message d'erreur si l'email n'est pas valide
  }
  if ($password === "") {
    $errors[] = 'Le mot de passe est requis.'; // Ajoute un message d'erreur si le mot de passe est vide
  }

  if(!$errors) { // Si aucune erreur de validation
    $statement = $sqlClient->prepare("SELECT id, email, password_hash FROM registered_users WHERE email = :email",); // Prépare une requête SQL pour récupérer l'utilisateur par email  
    $statement->execute(['email' => $email]); // Exécute la requête avec l'email fourni
    $user = $statement->fetch(); // Récupère le résultat de la requête

    if ($user && password_verify($password, $user['password_hash'])) { // Vérifie si l'utilisateur existe, si le mot de passe est correct et si le hash du mot de passe est valide
      $_SESSION['user'] = ['id' => $user['id'], 'email' => $user['email']]; // Stocke les informations de l'utilisateur dans la session
      header('Location: ./index.php'); // Redirige vers la page d'accueil
      exit;
    } else {
      $errors[] = 'Email ou mot de passe incorrect.'; // Ajoute un message d'erreur si les informations de connexion sont incorrectes
    }
  }
}
?>


<?php require __DIR__ . '/head.php'; ?>
<?php require __DIR__ . '/header.php'; ?>

<main class="mx-auto max-w-md px-4 py-10">
  <h1 class="text-2xl font-semibold text-center">Connexion</h1>

  <?php if ($errors): ?>
    <div class="mb-4 rounded border border-red-400 bg-red-100 p-4 text-red-700">
      <ul class="list-disc list-inside">
        <?php foreach ($errors as $error): ?>
          <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="post" class="mt-6 space-y-4">

    <!-- Partie email -->
    <div>
      <label class="block text-sm font-medium">Email</label>
      <input name="email" type="email" class="mt-1 w-full rounded border px-3 py-2" value="<?= htmlspecialchars($email) ?>" required />
    </div>

    <!-- Partie password -->
    <div>
      <label class="block text-sm font-medium">Mot de passe</label>
      <input name="password" type="password" class="mt-1 w-full rounded border px-3 py-2" required />
    </div>

    <!-- Bouton submit -->
    <button class="w-full rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">
      Se connecter
    </button>
  </form>
</main>
</body>
</html>