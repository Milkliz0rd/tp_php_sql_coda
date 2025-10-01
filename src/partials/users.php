<?php require __DIR__ . '/head.php'; ?>
<?php require __DIR__ . '/header.php'; ?>
<?php require __DIR__ . '/../config/db.php'; ?>

<?php
$userStatement = $sqlClient->query("SELECT * FROM users ORDER BY id ASC"); //Préparation de la requête SQL pour récupérer tous les utilisateurs de la table "users" triés par ordre croissant d'ID
$users= $userStatement->fetchAll() ; //Exécution de la requête SQL et récupération de tous les résultats dans un tableau associatif
?>

<main class="mx-auto max-w-5xl px-4 py-10">
  <h1 class="text-2xl font-semibold mb-6">Liste des utilisateurs</h1>

  <table class="min-w-full border border-slate-300 bg-white shadow-sm rounded-lg overflow-hidden">
    <thead class="bg-slate-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider border-b border-slate-200">ID</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider border-b border-slate-200">Nom</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider border-b border-slate-200">Email</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider border-b border-slate-200">Crée le</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-200">
      <?php foreach ($users as $user): ?>
        <tr class="border-t">
          <td class="px-6 py-4 whitespace-nowrap border-b border-slate-200"><?= htmlspecialchars($user['id']) ?></td>
          <td class="px-6 py-4 whitespace-nowrap border-b border-slate-200"><?= htmlspecialchars($user['name']) ?></td>
          <td class="px-6 py-4 whitespace-nowrap border-b border-slate-200"><?= htmlspecialchars($user['email']) ?></td>
          <td class="px-6 py-4 whitespace-nowrap border-b border-slate-200"><?= htmlspecialchars($user['created_at']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
</body>
</html>