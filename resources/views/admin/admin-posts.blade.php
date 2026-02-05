        <x-admin>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Posts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Posts dataTable
                            </div>
                            <div>
                                <a href="{{ route('posts.create') }}" class="btn btn-primary">New post</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                @foreach ($categories as $category)
                                                    @if ($category->id == $post->category_id)
                                                        <td>{{ $category->name }}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{ $post->description }}</td>
                                                <td>


                                                    <div class="d-flex ">

                                                        <a href="{{ route('site.show', $post) }}"
                                                            class="btn btn-success mx-2">Read</a>

                                                        <a href="{{ route('posts.edit', $post) }}"
                                                            class="btn btn-secondary mx-2">Edit</a>

                                                        <form action="{{ route('posts.destroy', $post) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger mx-2"
                                                                type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
        </x-admin>
