<?php

namespace Terakyan\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sahakavatar\Cms\Models\Templates\Units;
use Sahakavatar\Console\Repository\FrontPagesRepository;
use Sahakavatar\Modules\Models\Migrations;
use Sahakavatar\Settings\Repository\AdminsettingRepository;
use Terakyan\Blog\Http\Requests\CreatePostRequest;
use Terakyan\Blog\Http\Requests\PostSettingsRequest;
use Terakyan\Blog\Repository\PostsRepository;
use Terakyan\Blog\Services\PostsService;

class IndexConroller extends Controller
{
    public function getIndex()
    {

        return view('blog::index');
    }

    public function getPosts(
        PostsRepository $postsRepository
    )
    {
        $posts = $postsRepository->getAll();

        return view('blog::list', compact(['posts']));
    }

    public function getNewPost()
    {
        return view('blog::create');
    }

    public function postNewPost(
        CreatePostRequest $request,
        PostsService $postsService
    )
    {
        $result = $postsService->create($request->except("_token", 'image'), $request->file("image"));

        return redirect()->to('admin/blog/posts')->with("message", "Post Successfully Created");
    }

    public function getSettings(
        FrontPagesRepository $pagesRepository
    )
    {
        $all = $pagesRepository->findBy('slug', 'all-posts');
        $single = $pagesRepository->findBy('slug', 'single-post');

        $table = 'posts';
        $columns = \DB::select('SHOW COLUMNS FROM ' . $table);
        $this->data['default'] = ['NULL', 'USER_DEFINED', 'CURRENT_TIMESTAMP'];
        $this->data['tbtypes'] = Migrations::types();
        $this->data['engine'] = Migrations::engine();
        $this->data['table'] = $table;
        $this->data['columns'] = $columns;
        foreach ($columns as $column) {
            $after_columns[$column->Field] = $column->Field;
        }
        $this->data['after_columns'] = $after_columns;

        return view('blog::settings', compact(['all', 'single']))->with($this->data);
    }

    public function getFormBulder()
    {
        //$data['form_fields'] = ($settings) ? json_decode($settings->value,true) : [];
        return view("blog::form_bulder");
    }


    public function postSettings(
        PostSettingsRequest $request,
        FrontPagesRepository $pagesRepository
    )
    {
        $pagesRepository->update($request->id, $request->except('id', '_token'));

        return redirect()->back();
    }

    public function unitRenderWithFields(
        Request $request,
        AdminsettingRepository $adminsettingRepository
    )
    {
        $settings = $adminsettingRepository->findBy("section", "terakyan_blog");
        $unit = Units::findByVariation($request->id);
        $data['unit'] = $unit;
        $data['fields'] = $unit->fields;
        $columns = \DB::select('SHOW COLUMNS FROM posts');
        foreach ($columns as $column) {
            $after_columns[$column->Field] = $column->Field;
        }
        $data['columns'] = $after_columns;
        $field_html = view("blog::_partials.fields")->with($data)->render();
        return \Response::json(['html' => BBRenderUnits($request->id), 'field_html' => $field_html]);
    }

    public function postFormFieldsSettings(Request $request, AdminsettingRepository $adminsettingRepository)
    {
        $data = $request->except('_token');
        $adminsettingRepository->createOrUpdate(json_encode($data,true), 'terakyan_blog', 'form_field_settings');
        return redirect()->back();
    }
}