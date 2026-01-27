<x-admin>

    <h1>Edit post</h1>

    <form action="{{ route('posts.update',$post) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="category">Category</label>
        <select class="form-control" name="category_id">
            <option value=""></option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option> 
            @endforeach
        </select>

        <label for="title">Title:</label>
        <input class="form-control" type="text" name="title" id="title" required>

        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="4" maxlength="255"></textarea>

        <label for="content">Content:</label>
        <textarea class="form-control" name="content" id="content" rows="8" required></textarea>

        <button class="btn btn-primary" type="submit">Edit</button>
    </form>

    <br>
    <a href="{{ route('posts.index') }}"><- Back</a>

</x-admin>
