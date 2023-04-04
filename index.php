<?php include_once "./templates/header.php"; ?>
<!-- Main content section  -->
<section class="text-gray-600 body-font min-h-[80vh]">
  <div class="container p-5 mx-auto">
    <div class="flex flex-wrap -m-4">
      <?php
      $data = $obj->getAllPosts();
      $row = mysqli_num_rows($data);
      if ($row > 0) {
        while ($posts = mysqli_fetch_array($data)) { ?>
          <div class="p-3 lg:w-1/4 md:w-1/3">
            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
              <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="<?php echo $posts['image']; ?>" alt="<?php echo $posts['title']; ?>">
              <div class="p-6">
                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1"><?php echo $posts['category']; ?></h2>
                <h1 class="title-font text-lg font-medium text-gray-900 mb-3"><?php echo (strlen($posts['title']) > 50 ? substr($posts['title'], 0, 50) . "..." : $posts['title']); ?></h1>
                <p class="leading-relaxed mb-3"><?php echo (strlen($posts['content']) > 100 ? substr($posts['content'], 0, 100) . "..." : $posts['content']); ?></p>
                <div class="flex items-center flex-wrap ">
                  <a href="blog.php?post_id=<?php echo $posts['id']; ?>" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0 gap-1 flex items-center">Learn More
                    <i class="fas fa-long-arrow-alt-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php }
      } else { ?>
        no found
      <?php } ?>
    </div>
  </div>
</section>
<?php include_once "./templates/footer.php"; ?>