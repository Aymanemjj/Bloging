<x-admin>

    <h1>New category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf


        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" id="name" required>

        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="4" maxlength="255"></textarea>


        <button class="btn btn-primary" type="submit">Post</button>
    </form>

    <br>
    <a href="{{ route('posts.index') }}"><- Back</a>

</x-admin>
