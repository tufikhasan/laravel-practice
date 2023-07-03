<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>All Posts With Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100 bg-light">
    <main class="flex-shrink-0">
        <!-- Projects Section-->
        <section class="py-5">
            <div class="container px-5 mb-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Latest post for each
                            category</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        @foreach ($categories as $key => $category)
                            <!-- Project Card 1-->
                            <h2>{{ $category->name }}</h2>
                            @if ($category->latestPost())
                                <p><b>Post Title: </b>{{ $category->latestPost()->title }}</p>
                            @else
                                <p>No posts available for this category.</p>
                            @endif
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
