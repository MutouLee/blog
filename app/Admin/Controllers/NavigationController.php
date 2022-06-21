<?php

namespace App\Admin\Controllers;

use App\Models\Navigation;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Tree;
use Dcat\Admin\Widgets\Box;
use Dcat\Admin\Widgets\Form as WidgetForm;

class NavigationController extends AdminController
{
    public function index(Content $content)
    {
//        return $content->title(trans('navigation.labels.navigation'))
//            ->description('列表')
//            ->body(function (Row $row){
//                $row->column(7, $this->treeView()->render());
//            });



        return $content->title(trans('navigation.labels.navigation'))
            ->description('列表')
            ->body(function (Row $row) {
                $tree = new Tree(new Navigation);
                $tree->disableCreateButton();
                $tree->maxDepth(2);
                $row->column(7, $tree);


                $row->column(5, function (Column $column){
                    $form = new WidgetForm();
                    $form->action(admin_url('navigation'));
                    $form->select('parent_id')->options(Navigation::selectOptions());
                    $form->text('title')->required();
                    $form->text('uri');
                    $form->icon('icon');
                    $form->width(9, 2);
                    $column->append(Box::make('新增导航菜单', $form));
                });
            });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Navigation(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('parent_id');
            $grid->column('order');
            $grid->column('title');
            $grid->column('icon');
            $grid->column('uri');
            $grid->column('extension');
            $grid->column('show');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

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
        return Show::make($id, new Navigation(), function (Show $show) {
            $show->field('id');
            $show->field('parent_id');
            $show->field('order');
            $show->field('title');
            $show->field('icon');
            $show->field('uri');
            $show->field('extension');
            $show->field('show');
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
        return Form::make(new Navigation(), function (Form $form) {
//            $form->display('id');
            $form->select('parent_id')->options(Navigation::selectOptions())->saving(function ($parent_id){
                return $parent_id === '' || $parent_id === null ? 0 : $parent_id;
            });
            $form->text('title');
            $form->text('order');
            $form->text('uri');
            $form->icon('icon');
            $form->switch('show');
        });
    }
}
