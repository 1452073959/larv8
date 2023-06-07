<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Td1Log;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class Td1LogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Td1Log(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('url');
            $grid->column('method');
            $grid->column('params');
            $grid->column('domain');
            $grid->column('time');
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
        return Show::make($id, new Td1Log(), function (Show $show) {
            $show->field('id');
            $show->field('url');
            $show->field('method');
            $show->field('params');
            $show->field('domain');
            $show->field('time');
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
        return Form::make(new Td1Log(), function (Form $form) {
            $form->display('id');
            $form->text('url');
            $form->text('method');
            $form->text('params');
            $form->text('domain');
            $form->text('time');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
