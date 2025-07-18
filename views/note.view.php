<!-- //!Esta es la parte del Header  -->
<?php require 'partials/head.php'; ?>
<!-- //!De esta forma se crean componentes y se limpia el codigo para que sea mas claro -->
<?php require 'partials/nav.php'; ?>
<!-- //!esta parte es del header -->
<?php require 'partials/header.php'; ?>
<!-- //!Esta es la parte del Main  -->
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 underline">
                Go Back..
            </a>
        </p>
        <p><?= htmlspecialchars($note['body'])?></p>

    </div>
</main>
<!-- //!Esta parte es del footer -->
<?php require 'partials/footer.php'; ?>