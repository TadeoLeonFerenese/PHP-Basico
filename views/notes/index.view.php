<!-- //!Esta es la parte del Header  -->
<?php require(__DIR__ . '/../partials/head.php') ?>
<!-- //!De esta forma se crean componentes y se limpia el codigo para que sea mas claro -->
<?php require (__DIR__ . '/../partials/nav.php') ?>
<!-- //!esta parte es del header -->
<?php require (__DIR__ . '/../partials/header.php') ?>

<!-- //!Esta es la parte del Main  -->
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note) : ?>
            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                    <?= htmlspecialchars($note['body']) ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-6">
            <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
        </p>
    </div>
</main>
<!-- //!Esta parte es del footer -->
<?php require (__DIR__ . '/../partials/footer.php') ?>