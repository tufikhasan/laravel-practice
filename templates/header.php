<?php include_once "./inc/functions.php";
$obj = new Blogs();
define( 'SITE_PATE', 'http://localhost/' );

$script_name = $_SERVER['SCRIPT_NAME'];
$page_arr = explode( '/', $script_name );
$page_name = $page_arr[count( $page_arr ) - 1];

$meta_title = "Blog";
$meta_desc = "This is blog website";
$meta_keyword = "Blog,News,Magazine";
$meta_img = "https://plus.unsplash.com/premium_photo-1663852297654-56d979cf72d2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YmxvZ3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60";
$meta_url = SITE_PATE;

if ( "blog.php" == $page_name ) {
    $post_id = $_GET['post_id'];
    $post = $obj->getPostById( $post_id );
    $meta_title = $post['title'];
    $meta_desc = $post['content'];
    $meta_img = $post['image'];
    $meta_url = SITE_PATE . $page_name . "?post_id=" . $post_id;
}

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

    <meta property="og:title" content="<?php echo $meta_title; ?>" />
    <meta property="og:image" content="<?php echo $meta_img; ?>" />
    <meta property="og:url" content="<?php echo $meta_url; ?>" />
    <meta property="og:site_name" content="<?php echo SITE_PATE; ?>" />
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