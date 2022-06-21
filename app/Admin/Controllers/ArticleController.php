<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Category;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ArticleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(Article::with('category'), function (Grid $grid) {
            $grid->model()->orderByDesc('created_at');
            $grid->column('id')->sortable()->width(60);
            $grid->column('title');
            $grid->column('category_id')->display(function (){
                return $this->category->name;
            });
            $grid->column('cover')->image('/storage', null, 30);
//            $grid->column('content');
            $grid->column('view_count');
            $grid->column('stick')->switch();
            $grid->column('created_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Article(), function (Show $show) {
            $show->field('id');
            $show->field('category_id');
            $show->field('title');
            $show->field('cover');
            $show->field('content');
            $show->field('view_count');
            $show->field('stick');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Article(), function (Form $form) {
            $form->display('id');
            $form->select('category_id')->options(Category::query()->orderBy('displayorder')->get()->pluck('name', 'id'))->required();
            $form->text('title')->required();
            $form->image('cover')
                ->thumbnail('thumb', $width = 128, $height = 128)
                ->dir(now()->format('Ym'))
                ->maxSize(2048)
                ->uniqueName()
                ->autoUpload();
            $form->editor('content')->required();
            $form->number('view_count');
            $form->switch('stick');
            $form->datetime('created_at')->format('YYYY-MM-DD HH:mm')->default(now()->format('Y-m-d H:i'));
            $form->display('updated_at');
        });
    }
}
