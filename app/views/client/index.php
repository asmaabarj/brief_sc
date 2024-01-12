<?php
require_once(__DIR__."/../../controllers/ConWiki.php");
require_once(__DIR__ . "/../../controllers/ContCategory.php");




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
      <div class=" flex justify-between gap-4">
        <ul class='lg:!flex lg:flex-auto '> 
          <li class=' lg:items-center ml-auto '>
            <a href='../authentification/signIn.php' class='lg:hover:text-[#007bff] text-gray-700 block font-bold text-[15px]'>sign in</a>
          </li>
        </ul>
      <div class="border-l border-[#333] h-6 max-lg:hidden "></div>   
        <a href='../authentification/signUp.php' class='flex items-center ml-auto lg:hover:text-[#007bff] text-gray-700 block font-bold text-[15px] mr-6 '>sign up</a>
   </div>
  </header>
   <main>
    <section>
    <div class="bg-gradient-to-r from-gray-200 to-gray-50 font-[sans-serif] text-gray-800 p-6">
      <div class="grid md:grid-cols-2 items-center gap-10 max-w-5xl max-md:max-w-md mx-auto">
        <div class="md:h-[400px]">
          <img src="../../../public/images/wikipedia.jpg" class="w-full h-full object-contain" />
        </div>
        <div class="max-md:text-center">
          <h3 class="md:text-3xl text-2xl md:leading-10">Discover Wiki™ where knowledge meets boundless exploration.</h3>
          <p class="mt-6 text-sm">Welcome to our literary sanctuary, where every word is a gateway to the boundless realm of creativity. Join us to explore, write, and contribute to the collective epic of knowledge.</p>
          <button type="button" class="px-6 py-2 mt-8 font-semibold rounded text-sm outline-none border-2 border-white">Explore</button>
        </div>
      </div>
    </div>
    </section>

<section class="w-[90%] m-auto mt-20">
<div class="bg-white font-[sans-serif]">
      <div class="max-w-7xl mx-auto">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-[#333] inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-gray-400 after:rounded-full">CATEGORIES</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16 max-md:max-w-lg mx-auto">
        <?php
          foreach ($resultCate as $CATEGORIE) :
          ?>
          <div class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative group">
            <img src="<?= $CATEGORIE->__get('category_image'); ?>" alt="Blog Post 1" class="w-full h-96 object-cover" />
            <div class="p-6 absolute bottom-0 left-0 right-0 bg-white opacity-90">
              <h3 class="text-xl font-bold text-[#333]"><?= $CATEGORIE->__get('category_name'); ?></h3>
              <div class="h-0 overflow-hidden group-hover:h-16 group-hover:mt-4 transition-all duration-300">
                <p class="text-gray-600 text-sm"><?= $CATEGORIE->__get('category_desc'); ?></p>
              </div>
            </div>
          </div>
          <?php
          endforeach;
          ?>
        </div>
      </div>
    </div>
    
</section>
<div class="flex justify-center mt-5">
<a href="allCategories.php"><button type="button" 
    class="px-6 py-2 rounded text-black text-sm tracking-wider font-medium outline-none border-2 border-[#333] hover:bg-[#222] hover:text-white transition-all duration-300">Show more Categories</button>
    </a></div>
    <section class="mt-24">
<div class="bg-white font-[sans-serif] p-4">
      <div class="max-w-6xl max-md:max-w-lg mx-auto">
        <div>
          <h2 class="text-3xl font-extrabold text-[#333] inline-block">LATEST WIKIS</h2>
        </div>
        <div class="grid grid-cols-1  gap-8 mt-10">
        <?php
          foreach ($archivee as $archive) :
          ?>
          <div class="flex max-lg:flex-col bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] hover:scale-105 transition-all duration-300">
            <img src="<?= $archive->__get('wiki_image'); ?>" alt="Blog Post 1" class="lg:w-2/5 min-h-[250px] h-full object-cover" />
            <div class="p-6 lg:w-3/5">
              <h3 class="text-xl font-bold text-[#333]"><?= $archive->__get('wiki_title'); ?></h3>
              <span class="text-sm block text-gray-400 mt-2"><?= $archive->__get('created_at'); ?></span>
              <p class="text-sm mt-4"><?= $archive->__get('wiki_summarize'); ?></p>
              <a href="allWikis.php" class="mt-4 inline-block text-blue-600 text-sm hover:underline">show more wikis</a>
            </div>
          </div>
          <?php
          endforeach;
          ?>
        </div>
      </div>
    </div>
</section>

   </main>
  <footer class="bg-gray-900 font-[sans-serif] mt-10">
      <div class="px-10 md:px-16 py-12 grid sm:grid-cols-2 xl:grid-cols-4 gap-8">
        <div>
          <h4 class="text-white text-lg font-bold mb-6">About Us</h4>
          <p class="text-gray-300 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultrices
            ultricies diam id scelerisque.</p>
          <ul class="space-y-4 mt-8">
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 fill-current text-white mr-4"
                viewBox="0 0 24 24">
                <path
                  d="m14 9.09 8.81 1.75c.71.15 1.19.75 1.19 1.46v10.2c0 .83-.67 1.5-1.5 1.5h-9c.28 0 .5-.22.5-.5V23h8.5c.27 0 .5-.22.5-.5V12.3c0-.23-.16-.44-.39-.49L14 10.11z"
                  data-original="#000000" />
                <path
                  d="M19.5 14c.28 0 .5.22.5.5s-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5s.22-.5.5-.5zm0 3c.28 0 .5.22.5.5s-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5s.22-.5.5-.5zm0 3c.28 0 .5.22.5.5s-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5s.22-.5.5-.5zM14 23.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5v-14c0-.15.07-.29.18-.39.12-.09.27-.13.42-.1l.4.08V23z"
                  data-original="#000000" />
                <path
                  d="M13 23v.5c0 .28.22.5.5.5h-4c.28 0 .5-.22.5-.5V23zM10.5 5c.28 0 .5.22.5.5s-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5s.22-.5.5-.5zm.5 3.5c0 .28-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h2c.28 0 .5.22.5.5zm-.5 2.5c.28 0 .5.22.5.5s-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5s.22-.5.5-.5zm0 3c.28 0 .5.22.5.5s-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5s.22-.5.5-.5zm-4.5.5c0 .28-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h2c.28 0 .5.22.5.5zM5.5 5c.28 0 .5.22.5.5s-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5s.22-.5.5-.5zm0 3c.28 0 .5.22.5.5s-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5s.22-.5.5-.5zm0 3c.28 0 .5.22.5.5s-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5s.22-.5.5-.5zM9 18.5c0-.28-.23-.5-.5-.5h-3c-.28 0-.5.22-.5.5V23H4v-4.5c0-.83.67-1.5 1.5-1.5h3c.83 0 1.5.67 1.5 1.5V23H9z"
                  data-original="#000000" />
                <path d="M5 23h5v.5c0 .28-.22.5-.5.5h-5c-.28 0-.5-.22-.5-.5V23z" data-original="#000000" />
                <path
                  d="m1.75.2 10.99 1.67c.73.12 1.26.74 1.26 1.48v5.74l-.4-.08c-.15-.03-.3.01-.42.1-.11.1-.18.24-.18.39V3.35c0-.25-.18-.46-.42-.5L1.59 1.19c-.03-.01-.06-.01-.09-.01-.12 0-.23.04-.32.12-.12.1-.18.23-.18.38V22.5c0 .28.23.5.5.5H4v.5c0 .28.22.5.5.5h-3C.67 24 0 23.33 0 22.5V1.68C0 1.24.19.82.53.54.87.25 1.31.13 1.75.2z"
                  data-original="#000000" />
              </svg>
              <a href="javascript:void(0)" class="hover:text-white text-gray-300 text-sm">Company</a>
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 fill-current text-white mr-4"
                viewBox="0 0 32 32">
                <path
                  d="M27 7h-5V6c0-1.654-1.346-3-3-3h-6c-1.654 0-3 1.346-3 3v1H5c-1.654 0-3 1.346-3 3v16c0 1.654 1.346 3 3 3h22c1.654 0 3-1.346 3-3V10c0-1.654-1.346-3-3-3zM12 6c0-.551.449-1 1-1h6c.551 0 1 .449 1 1v1h-8zm-1 3h15.798l-3.036 4.555a.998.998 0 0 1-.832.445h-3.114A2.996 2.996 0 0 0 17 12h-2a2.996 2.996 0 0 0-2.816 2H9.07a1 1 0 0 1-.832-.445L5.202 9zm7 6c0 .551-.449 1-1 1h-2c-.551 0-1-.449-1-1s.449-1 1-1h2c.551 0 1 .449 1 1zm10 11c0 .551-.449 1-1 1H5c-.551 0-1-.449-1-1V10.803l2.574 3.861A2.996 2.996 0 0 0 9.07 16h3.114A2.996 2.996 0 0 0 15 18h2a2.996 2.996 0 0 0 2.816-2h3.114c1.005 0 1.938-.5 2.496-1.336L28 10.803z"
                  data-original="#000000" />
              </svg>
              <a href="javascript:void(0)" class="hover:text-white text-gray-300 text-sm">Careers</a>
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 fill-current text-white mr-4"
                viewBox="0 0 64 64">
                <path
                  d="m52.148 42.678-6.479-4.527a5 5 0 0 0-6.963 1.238l-1.504 2.156c-2.52-1.69-5.333-4.05-8.014-6.732-2.68-2.68-5.04-5.493-6.73-8.013l2.154-1.504a4.96 4.96 0 0 0 2.064-3.225 4.98 4.98 0 0 0-.826-3.739l-4.525-6.478C20.378 10.5 18.85 9.69 17.24 9.69a4.69 4.69 0 0 0-1.628.291 8.97 8.97 0 0 0-1.685.828l-.895.63a6.782 6.782 0 0 0-.63.563c-1.092 1.09-1.866 2.472-2.303 4.104-1.865 6.99 2.754 17.561 11.495 26.301 7.34 7.34 16.157 11.9 23.011 11.9 1.175 0 2.281-.136 3.29-.406 1.633-.436 3.014-1.21 4.105-2.302.199-.199.388-.407.591-.67l.63-.899a9.007 9.007 0 0 0 .798-1.64c.763-2.06-.007-4.41-1.871-5.713z"
                  data-original="#000000" />
              </svg>
              <a href="javascript:void(0)" class="hover:text-white text-gray-300 text-sm">Contact</a>
            </li>
          </ul>
        </div>
        <div>
          <h4 class="text-white text-lg font-bold mb-6">Products</h4>
          <ul class="list-none space-y-4">
            <li><a href="javascript:void(0)" class="hover:text-white text-gray-300 text-sm">Sale</a></li>
            <li><a href="javascript:void(0)" class="hover:text-white text-gray-300 text-sm">New arrivals</a></li>
            <li><a href="javascript:void(0)" class="hover:text-white text-gray-300 text-sm">Shop</a></li>
            <li><a href="javascript:void(0)" class="hover:text-white text-gray-300 text-sm">Store</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-white text-lg font-bold mb-6">Resources</h4>
          <ul class="list-none space-y-4">
            <li><a href="javascript:void(0)" class="hover:text-white text-gray-300 text-sm">Documentation</a></li>
            <li><a href="javascript:void(0)" class="hover:text-white text-gray-300 text-sm">Tutorials</a></li>
            <li><a href="javascript:void(0)" class="hover:text-white text-gray-300 text-sm">Blog</a></li>
            <li><a href="javascript:void(0)" class="hover:text-white text-gray-300 text-sm">FAQ</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-white text-lg font-bold mb-6">Subscribe</h4>
          <p class="text-gray-300 mb-4">Subscribe to our newsletter to receive updates and exclusive offers.</p>
          <form>
            <div class="flex">
              <input type="email" class="px-4 py-3.5 text-sm rounded-l-lg w-full focus:outline-none"
                placeholder="Enter your email address" />
              <button type="button"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 rounded-r-lg text-sm tracking-wide">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
      <div class="bg-gray-800 py-5 px-4 text-center">
        <p class='text-gray-300 text-sm'>© 2023<a href='https://readymadeui.com/' target='_blank'
          class="hover:underline mx-1">ReadymadeUI</a>All Rights Reserved.</p>
      </div>
    </footer>
</body>
</html>
