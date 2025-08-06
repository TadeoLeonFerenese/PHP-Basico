<!-- //!Esta es la parte del Header  -->
<?php require base_path('views/partials/head.php'); ?>
<!-- //!De esta forma se crean componentes y se limpia el codigo para que sea mas claro -->
<?php require base_path('views/partials/nav.php'); ?>
<!-- //!esta parte es del header -->
<?php require base_path('views/partials/header.php'); ?>
<!-- //!Esta es la parte del Main  -->
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 underline">
                Go Back..
            </a>
        </p>
        <p><?= htmlspecialchars($note['body'])?></p>



        <footer class="mt-6">
            <a href="/note/edit?id=<?= $note['id']?>"
                class="inline-flex justify-center rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Edit</a>
        </footer>

        <!-- 
        <form action="" class="mt-6" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id']?>">
            <button class="text-sm text-red-500">Delete</button>
        </form> -->

    </div>
</main>
<!-- //!Esta parte es del footer -->
<?php require base_path('views/partials/footer.php'); ?>