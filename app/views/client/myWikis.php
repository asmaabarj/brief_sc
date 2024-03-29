<?php

require_once(__DIR__ . "/../../controllers/conWiki.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
<header class=' py-2 px-2 sm:px-10  min-h-[70px]'>
    <div class='flex justify-between items-center gap-x-4  '>
      <a href="index.php"><img src="../../../public/images/wikilogo.png" alt="logo" class='w-20 h-12' />
      </a>  
      <div class=" flex justify-between gap-10">
        <ul class='lg:!flex lg:flex-auto '> 
          <li class=' lg:items-center ml-auto '>
            <a href='myWikis.php' class='lg:hover:text-[#007bff] bg-gray-800 px-4 py-2 rounded-[5px] text-gray-100 block font-bold text-[15px]'>My Wikis</a>
          </li>
        </ul>
        <a href='../authentification/signIn.php' class='flex items-center ml-auto lg:hover:text-[#007bff] text-gray-700 block font-bold text-[15px] mr-2 '><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg></a>
   </div>
  </header>
  <main class="w-[80%] m-auto"></main>
<a href="addWiki.php"><button type="button" 
    class="px-6 py-2 mt-24 absolute right-32 w rounded text-black text-sm tracking-wider font-medium outline-none border-2 border-[#333] hover:bg-[#222] hover:text-white transition-all duration-300">add wiki</button>
</a>
<div class="overflow-x-auto mt-20 py-8">
      <table class="min-w-[80%] mx-auto mt-10 bg-white font-[sans-serif]">
        <thead class="whitespace-nowrap">
          <tr>
            <th class="px-6 py-4 text-left text-sm font-semibold text-black">
              Wiki title
            </th>

            <th class="px-6 py-4 text-left text-sm font-semibold text-black">
              description
            </th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-black">
              created at
            </th>

            <th class="px-6 py-4 text-left text-sm font-semibold text-black">
              Action
            </th>
          </tr>
        </thead>

        <tbody class="whitespace-nowrap">
        <?php
    foreach ($wikisAuteur as $wiki) :
    ?>
            <tr class="odd:bg-blue-50">
              <td class="px-6 py-3 text-sm">
                <div class="flex items-center cursor-pointer">
                  <img src='<?= $wiki->__get('wiki_image') ?>' class="w-9 h-9 rounded-md shrink-0" />
                  <div class="ml-4">
                    <p class="text-sm text-black"><?= $wiki->__get('wiki_title') ?></p>
                  </div>
                </div>
              </td>

              <td class="truncate px-6 py-3 text-sm max-w-[300px]"><?= $wiki->__get('wiki_summarize') ?>
              </td>
              <td class="px-6 py-3 text-sm w-[30vw]"><?= $wiki->__get('created_at') ?>
              </td>

              <td class="px-6 py-3">
                <div class="flex">
                  <form method="post" action="../../controllers/ConWiki.php">

                    <button class="mr-4" name="edit" value="<?= $wiki->__get('id'); ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-black hover:fill-blue-700" viewBox="0 0 348.882 348.882">
                        <path d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z" data-original="#000000" />
                        <path d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z" data-original="#000000" />
                      </svg>
                    </button>
                  </form>

                  <form method="post" action="../../controllers/ConWiki.php">
                    <button class="mr-4" name="delete" type="submit" value="<?= $wiki->__get('id'); ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-black hover:fill-red-700" viewBox="0 0 24 24">
                        <path d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z" data-original="#000000" />
                        <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z" data-original="#000000" />
                      </svg>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php
          endforeach;
          ?>
        </tbody>

      </table>
</body>

</html>


