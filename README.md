# Blogging

## Introduction
Basic web app for managing blogs, devaloped for the purpos of leaning the Laravel framwork and its suplemental packages, e.g Elequant and Blade .

## Front office
Consists of a home page wich hase all the posts, with search and categorys.
A page for the full post.

## Back office
The admin side:
- a dasboard for overview of the site
- 3 tables for managing  Users, Posts, and Categories

## Layouts and Componenets
2 different Componenets:
**admin** for the back office
**main** for the front office
### Layouts
these are the actuall pages, stuff that isent repeated

## Admin dashboard
**Utilises both Post and Category Controllers** 
The dashboard allowes for:
#### CRUD:
for **Categories**:
```
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        category::create($validated);

        $request->session()->flash('success', 'Category was created!');

        return redirect()->route('categories.index');
    }

    public function update(Request $request, category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $validated['completed'] = $request->has('completed');

        $category->update($validated);

        $request->session()->flash('success', 'Category was edited!');

        return redirect()->route('categories.index');
    }


    public function destroy(category $category, Request $request)
    {
        $category->delete();

        $request->session()->flash('success', 'Category was deleted!');

        return redirect()->route('categories.index');
    }


```

and **Posts**

```
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'content' => 'required',
            'category_id' => 'required'

        ]);

        post::create($validated);

        return redirect()->route('posts.index');
    }

    public function update(Request $request, post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'content' => 'required',
            'category_id' => 'required'

        ]);

        $validated['completed'] = $request->has('completed');

        $post->update($validated);

        $request->session()->flash('success', 'Post was edited!');

        return redirect()->route('posts.index');
    }


    public function destroy(post $post, Request $request)
    {
        $post->delete();

        $request->session()->flash('success', 'Post was deleted!');

        return redirect()->route('posts.index');
    }

```
## Index
**Managed by the SiteController**

Displays all the posts **paginated** to 3 per page, with the title, date, and description visible per post card.
**Category filter** on the side, clicking on one will display all the posts belonging to that category

```
    public function index()
    {
        $posts = post::paginate(3);
        $categories = category::all();
        return view('index', compact('posts', 'categories'));
    }

    public function show($id)
    {   
        $categories = category::all();
        $post = post::find($id);
        return view('post', compact('post','categories'));
    }

    public function edit($id)
    {
        if ($id === "all") {
            $posts = post::paginate(3);
        } else {
            $posts = post::where('category_id', $id)->paginate(3);
        }
        $categories = category::all();
        return view('index', compact('posts', 'categories'));
    }

```
