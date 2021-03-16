<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Good;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class GoodController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Good(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('brand');
            $grid->column('cid');
            $grid->column('context');
            $grid->column('fee');
            $grid->column('icon');
            $grid->column('name');
            $grid->column('oldfee');
            $grid->column('paynum');
            $grid->column('shopId');
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
        return Show::make($id, new Good(), function (Show $show) {
            $show->field('id');
            $show->field('brand');
            $show->field('cid');
            $show->field('context');
            $show->field('fee');
            $show->field('icon');
            $show->field('name');
            $show->field('oldfee');
            $show->field('paynum');
            $show->field('shopId');
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
        return Form::make(new Good(), function (Form $form) {
            $form->display('id');
            $form->text('brand');
            $form->text('cid');
            $form->text('context');
            $form->text('fee');
            $form->text('icon');
            $form->text('name');
            $form->text('oldfee');
            $form->text('paynum');
            $form->text('shopId');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
