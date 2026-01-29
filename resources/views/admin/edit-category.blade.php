<x-admin>
    <div class="mx-2"  id="layoutSidenav_content"> 

    <h1>Edi category</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" id="name" required value="{{$category->name}}">

        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="4" maxlength="255">{{$category->description}}</textarea>


        <button class="btn btn-primary" type="submit">Edit</button>
    </form>

    <br>
    <a href="{{ route('categories.index') }}"><- Back</a>
</div>
</x-admin>
