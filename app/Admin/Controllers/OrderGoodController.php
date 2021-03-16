<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\OrderGood;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class OrderGoodController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new OrderGood(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('fee');
            $grid->column('gid');
            $grid->column('mid');
            $grid->column('num');
            $grid->column('oid');
            $grid->column('status');
            $grid->column('tid');
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
        return Show::make($id, new OrderGood(), function (Show $show) {
            $show->field('id');
            $show->field('fee');
            $show->field('gid');
            $show->field('mid');
            $show->field('num');
            $show->field('oid');
            $show->field('status');
            $show->field('tid');
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
        return Form::make(new OrderGood(), function (Form $form) {
            $form->display('id');
            $form->text('fee');
            $form->text('gid');
            $form->text('mid');
            $form->text('num');
            $form->text('oid');
            $form->text('status');
            $form->text('tid');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
