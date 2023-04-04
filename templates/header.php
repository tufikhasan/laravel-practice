<?php include_once "./inc/functions.php";
$obj = new Blogs();
$meta_title = "Blog";
$meta_desc = "This is blog website";
$meta_keyword = "Blog,News,Magazine";

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="<?php echo $meta_desc; ?>">
    <meta name="keywords" content="<?php echo $meta_keyword; ?>">
</head>

<body>
    <!-- Header section -->
    <header class="text-gray-600 body-font shadow-lg">
        <div class="container mx-auto flex flex-wrap py-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="./">
                <span class="ml-3 text-xl">BLOG</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900" href="./">Home</a>
                <a class="mr-5 hover:text-gray-900" href="./blogs.php">Blog</a>
                <a class="mr-5 hover:text-gray-900" href="./contact.php">Contact</a>
            </nav>
        </div>
    </header>