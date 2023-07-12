@extends('app') @section('site_title', 'Blog Details Page') @section('content')
<section class="text-gray-600 body-font mt-16">
    <!-- Blog Details Page -->
    <div class="container px-8 mx-auto xl:px-5 py-5 lg:py-8 !pt-0">
        <div class="mx-auto">
            <h1
                class="text-brand-primary mb-3 mt-2 text-center text-3xl font-semibold tracking-tight dark:text-white lg:text-4xl lg:leading-snug">
                {{ $blog->title }}
            </h1>
        </div>
    </div>
    <div class="relative z-0 mx-auto aspect-video max-w-screen-lg overflow-hidden lg:rounded-lg">
        <img src="{{ $blog->image }}" alt="{{ $blog->title }}"
            style="
                position: absolute;
                height: 100%;
                width: 100%;
                inset: 0px;
                color: transparent;
            " />
    </div>
    <div class="container px-8 mx-auto xl:px-5 max-w-screen-lg py-5 lg:py-8">
        <div class="prose mx-auto my-3 dark:prose-invert prose-a:text-blue-600">
            <p>{{ $blog->description }}</p>
        </div>
        <div class="comment_data">
            <h4 class="text-2xl mt-8 mb-4">Comments -
                {{ count($blog['comment']) < 10 && count($blog['comment']) != 0 ? '0' . count($blog['comment']) : count($blog['comment']) }}
            </h4>
            <hr class="my-4" />
            @forelse ($blog['comment'] as $comment)
                <div class="flex items-start mb-4">
                    <div class="flex">
                        <span
                            class="flex justify-center items-center w-[40px] h-[40px] bg-indigo-600 text-white font-bold rounded-[50%] mr-5 uppercase">{{ substr($comment['name'], 0, 1) }}</span>
                        <div>
                            <h5 class="font-bold">{{ $comment->email }}</h5>
                            <p>{{ $comment->comment }}</p>
                        </div>
                        <hr>
                    </div>
                </div>
            @empty
                <h3 class="font-bold">No Comments found</h5>
            @endforelse
        </div>

        <form class="mt-8" id="comment_form">
            <h5 class="text-xl mb-2">Add a Comment</h5>
            <input type="hidden" id="blog_id" value="{{ $blog->id }}" />
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Name</label>
                <input type="text" id="name" class="w-full p-2 border border-gray-300 rounded" />
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold">Email</label>
                <input type="email" id="email" class="w-full p-2 border border-gray-300 rounded" />
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-gray-700 font-bold">Comment</label>
                <textarea id="comment" rows="3" class="w-full p-2 border border-gray-300 rounded"></textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded">
                Submit
            </button>
        </form>
    </div>
</section>
@endsection @section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    try {
        const form = document.getElementById("comment_form");
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const blog_id = document.getElementById("blog_id").value;
            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;
            const comment = document.getElementById("comment").value;

            if (name.length === 0) {
                toastr.info("Name is required");
            } else if (email.length === 0) {
                toastr.info("Email is required");
            } else if (comment.length === 0) {
                toastr.info("Comment is required");
            } else {
                const formData = {
                    blog_id: blog_id,
                    name: name,
                    email: email,
                    comment: comment,
                };
                const URL = "{{ url('/comment') }}";
                const result = await axios.post(URL, formData);
                if (result.status == 201 && result.data.status == "success") {
                    toastr.success(
                        "Your Comment has been submitted successfully."
                    );
                    $(".comment_data").load(location.href + ' .comment_data');
                    form.reset();
                } else {
                    toastr.warning("Something went wrong");
                }
            }
        });
    } catch (error) {
        console.log(error);
    }
</script>
@endsection
