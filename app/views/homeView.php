<<<<<<< HEAD
<?php 
    require_once __DIR__ . '/layout/header.php';    
?>
</head>
<body class="w-screen h-screen">
    <header>
        <nav style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Task Manager</span>
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse text-white">
                    Welcome &nbsp;&nbsp;&nbsp;
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Logout</a>
=======
<?php

    use davidflorido\Lib\SessionManager;

    require_once __DIR__ . '/layout/header.php';    
?>
<link rel="stylesheet" href="../public/css/home.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body class="w-full h-full m-0 p-0">
    <header class="w-full">
        <nav style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);" class="opacity-80">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">TaskMaster</span>
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse text-white">
                    Welcome &nbsp; <?= SessionManager::getSessionVar('username');?> &nbsp; &nbsp; &nbsp;
                    <a href="logout" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Logout</a>
>>>>>>> 048bd86c341ccc636111bb909ef6f561e0513188
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
<<<<<<< HEAD
                        <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Tasks</a>
=======
                        <a href="home" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="tasks" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Tasks</a>
>>>>>>> 048bd86c341ccc636111bb909ef6f561e0513188
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Pricing</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Contact</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<<<<<<< HEAD
    <main>
=======
    <main class="w-full h-full flex flex-col justify-center items-center">
        <div class="text-white text-center mx-auto">
            <h1 class="font-bold text-5xl leading-tight mb-5">Mantén el control <br> de lo que importa</h1>
            <h2 class="text-xl text-gray-400 font-medium">La forma más simple de gestionar tus proyectos y tareas diarias</h2>
        </div>
        <!-- Botones -->
        <div class="text-white mt-7 flex gap-20 justify-center items-center font-medium">
            <a href="tasks" class="bg-orange-800 hover:bg-orange-500 px-4 py-4 rounded opacity-80">¡Empieza ahora!</a>
            <a href="documentation">Conocer más</a>
        </div>
>>>>>>> 048bd86c341ccc636111bb909ef6f561e0513188
    </main>
<?php 
    require_once __DIR__ . '/layout/footer.php';    
?>