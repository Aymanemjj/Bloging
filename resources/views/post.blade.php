    <x-main>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                            <!-- Post categories-->
                            @foreach ($categories as $category)
                                @if ($category->id == $post->category_id)
                                    <a class="badge bg-secondary text-decoration-none link-light"
                                        href="{{ route('site.edit', $category->id) }}">{{ $category->name}}</a>
                                @endif
                            @endforeach

                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded"
                                src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                        <div>
                            <h5>Sommair : </h5>
                            <p class="fs-5 mb-4">{{ $post->description }}</p>
                        </div>

                        <div class="dropdown-divider">f</div>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{ $post->content }}</p>
                        </section>
                    </article>

    </x-main>
