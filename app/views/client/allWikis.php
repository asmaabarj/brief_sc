<?php
require_once(__DIR__."/../../controllers/ConWiki.php");
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
<header class=' py-2 px-2 sm:px-10  min-h-[70px]'>
    <div class='flex justify-between items-center gap-x-4  '>
      <a href="index.php"><img src="../../../public/images/wikilogo.png" alt="logo" class='w-20 h-12' />
      </a>  
      <div class=" flex justify-between gap-4">
        <ul class='lg:!flex lg:flex-auto '> 
          <li class=' lg:items-center ml-auto '>
            <a href='' class='lg:hover:text-[#007bff] text-gray-700 block font-bold text-[15px]'>sign in</a>
          </li>
        </ul>
      <div class="border-l border-[#333] h-6 max-lg:hidden "></div>   
        <a href='' class='flex items-center ml-auto lg:hover:text-[#007bff] text-gray-700 block font-bold text-[15px] mr-6 '>sign up</a>
   </div>
  </header>
  <main class="flex justufy-center flex-col ">
  <div
          class="bg-gray-50  mt-2 outline-none border-gray-400 border-solid border-[1px] flex px-4 h-10 w-[50vw] m-auto">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px" class="fill-gray-400 mr-3">
            <path
              d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
            </path>
          </svg>
          <input type='text' placeholder='Search...' class=" outline-none w-[50vw] bg-gray-50 text-black text-sm" />
      </div>
  <div class="bg-white p-4 w-[95%] m-auto font-[sans-serif]">
      <div>
        <h2 class="text-3xl font-extrabold text-gray-800 mb-8">Latest Article Posts</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php
          foreach ($archiver as $archive) :
          ?>
                    <div class="bg-white rounded-lg overflow-hidden hover:scale-105 transition-all duration-300">
            <img src="<?= $archive->__get('wiki_image'); ?>" alt="Blog Post 1" class="w-full h-52 object-cover" />
            <div class="mt-2   flex items-center gap-[5px]">
                                <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10" fill="gray" viewBox="0 0 512 512">
                                <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" /></svg>
                                <p class=" text-gray-600 text-[10px] 	">
                                <?= $archive->__get('created_at'); ?>
                                </p>
                            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 "><?= $archive->__get('wiki_title'); ?> </h3>

              <p class="text-gray-600 text-sm"><?= $archive->__get('wiki_summarize'); ?></p>
              <div class="flex justify-between items-center">
              <a href="#" class="mt-4 inline-block text-blue-600 text-sm hover:underline">Read More</a>
              
            </div>
           </div>
          </div>
          
          <?php
          endforeach;
          ?>  
        </div>
      </div>
    </div>
  </main>
</body>
</html>