<?php 
    require_once __DIR__ . '/../layout/header.php';    
?>
<link rel="stylesheet" href="../public/css/error404.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body class="h-screen w-screen bg-gradient-to-r from-green-400 to-blue-500">
    <main class="w-full h-full flex justify-center items-center"> 
        <div class="w-[70%] h-[80%] rounded-xl flex flex-col justify-around">
            <h1 class="text-black font-black text-9xl opacity-30">Error 404</h1> 
            <p class="text-black font-black text-8xl opacity-30 self-end">Ups page not found</p>
        </div>
    </main>
<?php 
    require_once __DIR__ . '/../layout/footer.php';    
?>