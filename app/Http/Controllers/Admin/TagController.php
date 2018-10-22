<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Requests\DestroyTagRequest;
use App\Models\Tag;
use App\Services\TagFormFields;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tag.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = TagFormFields::formData();

        return view('admin.tag.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTagRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        $tag    = new Tag();
        $fields = TagFormFields::fields();
        foreach (array_keys($fields) as $field) {
            $tag->$field = $request->get($field);
        }
        $tag->save();

        return redirect('/admin/tags')->withSuccess(trans('messages.succes.tag-created', ['tag' => $tag->tag]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $tag    = Tag::findOrFail($id);
        $data   = TagFormFields::formData($tag);

        return view('admin.tag.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTagRequest $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);



        // foreach (array_keys(array_except($this->fields, ['tag'])) as $field) {
        //   $tag->$field = $request->get($field);
        // }
        // $tag->save();

        // return redirect("/admin/tag/$id/edit")
        //     ->withSuccess("Changes saved.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Http\Requests\DestroyTagRequest $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyTagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->posts()->detach();
        $tag->delete();

        return redirect()
            ->route('showtags')
            ->withSuccess(trans('messages.success.tag-deleted', ['tag' => $tag->tag]));
    }
}
