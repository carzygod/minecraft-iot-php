<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\GoodType;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class GoodTypeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new GoodType(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('baseFee');
            $grid->column('fee');
            $grid->column('fid');
            $grid->column('fname');
            $grid->column('icon');
            $grid->column('name');
            $grid->column('num');
            $grid->column('priority');
            $grid->column('sellerFee');
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
        return Show::make($id, new GoodType(), function (Show $show) {
            $show->field('id');
            $show->field('baseFee');
            $show->field('fee');
            $show->field('fid');
            $show->field('fname');
            $show->field('icon');
            $show->field('name');
            $show->field('num');
            $show->field('priority');
            $show->field('sellerFee');
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
        return Form::make(new GoodType(), function (Form $form) {
            $form->display('id');
            $form->text('baseFee');
            $form->text('fee');
            $form->text('fid');
            $form->text('fname');
            $form->text('icon');
            $form->text('name');
            $form->text('num');
            $form->text('priority');
            $form->text('sellerFee');
            $form->text('shopId');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
