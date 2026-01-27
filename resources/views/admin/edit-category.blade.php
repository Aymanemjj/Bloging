<x-admin>

    <h1>Edi category</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" id="name" required>

        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="4" maxlength="255"></textarea>


        <button class="btn btn-primary" type="submit">Edit</button>
    </form>

    <br>
    <a href="{{ route('categories.index') }}"><- Back</a>

</x-admin>
