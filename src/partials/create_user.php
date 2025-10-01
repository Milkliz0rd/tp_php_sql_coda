<?php require __DIR__ . '/head.php'; ?>
<?php require __DIR__ . '/header.php'; ?>

<main class="mx-auto max-w-5xl px-4 py-10">
  <h1 class="text-2xl font-semibold">Ajouter un utilisateur</h1>
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