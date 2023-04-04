<?php include_once "./templates/header.php";
if ( !isset( $_GET['post_id'] ) ) {
    header( "location: blogs.php" );
}
$post = $obj->getPostById( $_GET['post_id'] );
?>
<!-- Main content section  -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 min-h-[80vh]">
    <h1 class="text-3xl font-bold leading-tight text-gray-900 mt-12 mb-3"><?php echo $post['title']; ?></h1>
    <div class="mb-2">
        <p class="text-gray-700 font-medium">Written by <span class="text-red-600"><?php echo $post['author']; ?></span> on <span class="text-purple-600"><?php echo $post['created_at']; ?></span></p>
    </div>
    <div class="flex items-center mb-2">
        <span class="mr-2 text-gray-500">Share this post:</span>
        <a href="https://facebook.com/share.php?u=<?php echo $meta_url; ?>" target="_blank" class="mr-4 text-gray-500 hover:text-gray-700"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/share?text=<?php echo $meta_title; ?>&url=<?php echo $meta_url; ?>" target="_blank" class="mr-4 text-gray-500 hover:text-gray-700"><i class="fab fa-twitter"></i></a>
        <a href="https://api.whatsapp.com/send?text=<?php echo urldecode( $meta_title ); ?> <?php echo $meta_url; ?>" target="_blank" class="text-gray-500 hover:text-gray-700"><i class="fab fa-whatsapp"></i></a>
    </div>
    <div class="mb-8 flex-col md:flex-row flex gap-2">
        <div class="md:w-1/2 w-full">
            <img class="rounded-md" src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" class="w-full h-auto">
        </div>
        <div class="md:w-1/2 w-full">
            <p class="leading-relaxed"><?php echo $post['content']; ?></p>
        </div>
    </div>


</div>
<?php include_once "./templates/footer.php";?>