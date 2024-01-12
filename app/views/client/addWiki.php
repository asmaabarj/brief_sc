<?php 
require_once(__DIR__ . "/../../controllers/ConWiki.php");
require_once(__DIR__ . "/../../controllers/conTag.php");
require_once(__DIR__ . "/../../controllers/ContCategory.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki™</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<form action="../../controllers/conWiki.php" method="post" class=" min-w-screen mt-4 " enctype="multipart/form-data">
<?php
          if (isset($_SESSION['wikis'])) {
            [$title,$description,$image,$content] = $_SESSION['wikis'];
          
            unset($_SESSION['wikis']);
          }
          ?>
        <div class="grid md:grid-cols-2 md:gap-6 mx-4 lg:w-1/2 lg:mx-auto">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-white dark:text-white">Wiki Title</label>
                <input type="text" id="name" required name="Title" value="<?= $title ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Title">
            </div>
            <div class="mb-5">


                <label class="block mb-2 text-sm font-medium text-white " for="multiple_files">Wiki Image</label>
                <input type="file" name="image" required  class="block w-full bg-white rounded-lg text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>
        </div>
        <div class="mb-5 mx-4 lg:w-1/2 lg:mx-auto">
            <label for="summary" class="block mb-2 text-sm font-medium text-white dark:text-white">Wiki summary</label>
            <input type="text" name="summary" required value="<?= $description ?>" id="summary" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="summary">
        </div>
        <div class="mb-10 mx-4 lg:w-1/2 lg:mx-auto h-[30vh]">

            <label for="message" class="block mb-2 text-sm font-medium text-white dark:text-white">Wiki Content</label>
            <textarea id="message" required name="content" rows="4"  class="block  p-2.5 w-full h-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Share Your content here ..."><?= $content ?></textarea>

        </div>
        <?php if (isset($_SESSION['Idwiki'])) {
        } else { ?>

            <div class="grid mb-10 md:grid-cols-2 md:gap-6 mx-4 lg:w-1/2 lg:mx-auto">

                <select id="Catgories" required name="category" class="bg-gray-50 border h-[65px] border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a Category</option>

                    <?php foreach ($resultCat as $cat) : ?>

                        <option value="<?= $cat->__get('id') ?>"><?= $cat->__get('category_name') ?></option>
                    <?php endforeach; ?>

                </select>
                <div class="space-y-6 mt-4 md:mt-0 h-[65px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  p-2.5  overflow-auto scrollbar-w-2 scrollbar-track-gray-100 scrollbar-thumb-[#007bff]">
                    <?php foreach ($result as $tag) : ?>
                        <div class="flex items-center">
                            <input id="checkbox1"  type="checkbox" name="nametag[]" value="<?= $tag->__get('id') ?>" class="w-4 h-4 mr-3 focus:ring-1 focus:ring-offset-slate-200 focus:ring-offset-4 focus:ring-[#007bff]" />
                            <label for="checkbox1" class="text-black text-sm"><?= $tag->__get('tag_name') ?></label>
                        </div>
                    <?php endforeach; ?>





                </div>

            </div>
        <?php } ?>
        </div>
        <?php if (isset($_SESSION['idwiki'])) {
            $id = $_SESSION['idwiki'] ?>
            <div class="mx-4 lg:w-1/2 lg:mx-auto ">
                <button type="submit" name="updateWiki" value="<?= $id ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Wiki</button>
            </div>
        <?php     } else { ?>
            <div class="mx-4 lg:w-1/2 lg:mx-auto ">
                <button type="submit" name="addWiki" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Wiki</button>
            </div>
            <?php } ?>
    </form>
</body>
</html>