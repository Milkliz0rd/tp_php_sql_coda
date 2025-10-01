<?php require __DIR__ . '/../config/session.php'; ?>

<nav class="border border-black bg-gray-600">
  <ul class="flex gap-4 p-4 text-white">
    <?php if (empty($_SESSION['user'])): ?>
    <li><a href="./index.php">Accueil</a></li>
    <li><a href="./login.php">Se connecter</a></li>
    <?php endif; ?>

    <?php if (!empty($_SESSION['user'])): ?>
    <li><a href="./index.php">Accueil</a></li>
    <li><a href="./users.php">Utilisateurs</a></li>
    <li><a href="./create_user.php">Créer un utilisateur</a></li>
    <li><a href="./logout.php">Se déconnecter</a></li>
    <?php endif; ?>
  </ul>
</nav>