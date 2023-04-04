<?php include_once "./templates/header.php"; ?>
<!-- Main content section  -->
<section class="text-gray-600 body-font  min-h-[80vh]">
    <div class="container p-5 mx-auto flex flex-col md:flex-row">
        <div class="w-4/4 md:w-3/4 flex flex-wrap">
            <?php
            $data = $obj->getAllPosts();
            if (isset($_GET['search']) && $_GET['search'] != "") {
                $data = $obj->getPostByKeyword($_GET['search']);
            }
            if (isset($_GET['category']) && $_GET['category'] != "") {
                $data = $obj->getPostByCategory($_GET['category']);
            }
            $row = mysqli_num_rows($data);
            if ($row > 0) {
                while ($posts = mysqli_fetch_array($data)) { ?>
                    <div class="p-3 lg:w-1/3 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="<?php echo $posts['image']; ?>"
                                alt="<?php echo $posts['title']; ?>">
                            <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                    <?php echo $posts['category']; ?>
                                </h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                    <?php echo (strlen($posts['title']) > 50 ? substr($posts['title'], 0, 50) . "..." : $posts['title']); ?>
                                </h1>
                                <p class="leading-relaxed mb-3">
                                    <?php echo (strlen($posts['content']) > 100 ? substr($posts['content'], 0, 100) . "..." : $posts['content']); ?>
                                </p>
                                <div class="flex items-center flex-wrap ">
                                    <a href="blog.php?post_id=<?php echo $posts['id']; ?>"
                                        class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0 gap-1 flex items-center">Learn
                                        More
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <div class="p-3 w-[100%] flex items-center justify-center">
                    <h1 class="title-font text-lg font-lg text-red-500 font-bold ">Not found this search post -
                        <?php if (isset($_GET['search'])) {
                            echo "(" . $_GET['search'] . ")";
                        } ?>
                    </h1>
                </div>
            <?php } ?>
        </div>
        <div class="w-4/4 md:w-1/4 p-3">
            <div class="mb-5">
                <h1 class="text-lg font-bold title-font font-lg text-gray-900 mb-1">Search</h1>
                <form class="flex flex-1">
                    <input
                        class="border border-gray-300 py-2 px-4 rounded-l-md leading-tight focus:outline-none focus:border-blue-500"
                        type="text" placeholder="Search..." name="search">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r-md"
                        type="submit">
                        Search
                    </button>
                </form>
            </div>
            <div class="">
                <h1 class="text-lg font-bold title-font font-lg text-gray-900 mb-1">Category</h1>
                <?php
                $allCtgs = $obj->getAllCategory();
                while ($categories = mysqli_fetch_assoc($allCtgs)) { ?>
                    <a class="flex items-center gap-1" href="blogs.php?category=<?php echo $categories['category']; ?>"><i
                            class="fas fa-angle-double-right"></i>
                        <?php echo ucwords($categories['category']); ?>
                    </a>
                <?php } ?>
            </div>

        </div>
    </div>
</section>

<?php include_once "./templates/footer.php"; ?>