@extends('app')
@section('site_title', 'Home Page')
@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex-wrap justify-center h-[80vh] hidden items-center -m-4" id="loader">
                <img src="{{ asset('loader.gif') }}">
            </div>
            <div class="flex flex-wrap -m-4" id="blogs">

            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        (async () => {
            try {
                //loader show
                document.getElementById('loader').classList.remove('hidden');
                document.getElementById('loader').classList.add('flex');

                const URL = "{{ url('/allBlog') }}";
                const respone = await axios.get(URL);
                respone.data.forEach(blog => {

                    const dateTime = new Date(blog['created_at']);
                    const year = dateTime.getFullYear();
                    const month = dateTime.toLocaleString('default', {
                        month: 'long'
                    });
                    const day = dateTime.getDate();
                    const hours = dateTime.getHours();
                    const minutes = dateTime.getMinutes();
                    const seconds = dateTime.getSeconds();
                    const formattedTime = `${month} ${day}, ${year} ${hours}:${minutes}:${seconds}`;

                    let link = "{{ route('blog.details', ':id') }}".replace(':id', blog['id']);
                    document.getElementById('blogs').innerHTML += `<div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <a href="${link}"><img class="lg:h-48 md:h-36 w-full object-cover object-center" src="${blog['image']}"
                            alt="${blog['title']}"></a>
                        <div class="p-6">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">${formattedTime}</h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3"><a href="${link}">${blog['title']}</a></h1>
                            <p class="leading-relaxed mb-3">${blog['description']}</p>
                            <div class="flex items-center flex-wrap ">
                                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0"
                                    href="${link}">Learn
                                    More
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>`
                });
                //loader show
                document.getElementById('loader').classList.remove('flex');
                document.getElementById('loader').classList.add('hidden');
            } catch (error) {
                console.log(error)
            }
        })()
    </script>

@endsection
