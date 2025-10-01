<?php require __DIR__ . '/../config/session.php';
require __DIR__ . '/head.php'; 
require __DIR__ . '/header.php'; ?>

<!-- Landing Page -->
    <div class="flex flex-col bg-white gap-8 m-auto mt-20 border p-10 rounded-lg shadow-lg max-w-4xl">
      <h1 class="text-4xl font-bold underline text-center m-auto">Bienvenue sur mon exercice d'apprentissage de PHP et SQL</h1>
      <?php if (empty($_SESSION['user'])): ?>
      <p class="text-xl text-center m-auto">Vous n'êtes pas connecté. <a class="underline" href="./login.php">Connectez-vous</a> pour accéder aux fonctionnalités.</p>
      <?php endif; ?>
      <?php if (!empty($_SESSION['user'])): ?>
      <p class="text-xl text-center m-auto">Dans ce projet j'ai généré un tableau SQL "users".
        <br>
        J'ai ensuite créé une interface en PHP pour afficher les utilisateurs, en créer de nouveaux, les modifier et les supprimer.
        <br>
        <strong>Je vous invite à naviguer dans les différentes pages pour découvrir les fonctionnalités.</strong>
        <?php endif; ?>
      </p>
    </div>
  </body>
</html>