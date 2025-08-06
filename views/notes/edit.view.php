<!-- //!Esta es la parte del Header  -->
<?php require base_path('views/partials/head.php'); ?>
<!-- //!De esta forma se crean componentes y se limpia el codigo para que sea mas claro -->
<?php require base_path('views/partials/nav.php'); ?>
<!-- //!esta parte es del header -->
<?php require base_path('views/partials/header.php'); ?>
<!-- //!Esta es la parte del Main  -->
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/notes">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">

            <div class="space-y-12">
                <div class=" border-gray-900/10 pb-12">
                    <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="body" class="block text-sm font-medium text-gray-900">Body</label>
                            <div class="mt-2">
                                <textarea id="body" name="body" rows="3"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                    placeholder="Here is an idea for a note.."
                                    require><?= $_POST['body'] ?? '' ?></textarea>

                                <?php if (isset($errors['body'])): ?>
                                <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right sm:px-6 mt-5 gap-x-4 justify-end">
                        <a type="submit" href="/notes"
                            class="inline-flex justify-center rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Cancel
                        </a>

                        <button type="submit"
                            class="inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Update
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<!-- //!Esta parte es del footer -->
<?php require base_path('views/partials/footer.php'); ?>


<!-- //! ANOTACIONES -->

<!-- require><?= $_POST['body'] ?? '' ?>-->
<!-- EL REQUIRE SIRVE PARA QUE EL USUARIO NO PUEDA AGREGAR NOTAS VACIAS -->
<!-- EL ?? VERIFICA SI EXISTE UN VALOR EN $_POST['body'] -->