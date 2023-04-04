<?php include_once "./templates/header.php";
if (!isset($_GET['post_id'])) {
    header("location: blogs.php");
}
$data = $obj->getPostById($_GET['post_id']);
$post = mysqli_fetch_assoc($data);
?>
<!-- Main content section  -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 min-h-[80vh]">
    <!-- Post title -->
    <h1 class="text-3xl font-bold leading-tight text-gray-900 mt-12 mb-3"><?php echo $post['title']; ?></h1>
    <!-- Post author -->
    <div class="mb-2">
        <p class="text-gray-700 font-medium">Written by <span class="text-red-600"><?php echo $post['author']; ?></span> on <span class="text-purple-600"><?php echo $post['created_at']; ?></span></p>
    </div>
    <!-- Social sharing buttons -->
    <div class="flex items-center mb-2">
        <span class="mr-2 text-gray-500">Share this post:</span>
        <a href="#" class="mr-4 text-gray-500 hover:text-gray-700"><i class="fab fa-facebook"></i></a>
        <a href="#" class="mr-4 text-gray-500 hover:text-gray-700"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-gray-500 hover:text-gray-700"><i class="fab fa-linkedin"></i></a>
    </div>
    <!-- Post image -->
    <div class="mb-8 flex-col md:flex-row flex gap-2">
        <div class="md:w-1/2 w-full">
            <img class="rounded-md" src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" class="w-full h-auto">
        </div>
        <!-- Post content -->
        <div class="md:w-1/2 w-full">
            <?php echo $post['content']; ?>
        </div>
    </div>


</div>
<?php include_once "./templates/footer.php"; ?>