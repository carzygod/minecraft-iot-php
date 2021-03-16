<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class OrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Order(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('adress');
            $grid->column('discount');
            $grid->column('expFee');
            $grid->column('fee');
            $grid->column('finalFee');
            $grid->column('orderNum');
            $grid->column('orderSn');
            $grid->column('realPay');
            $grid->column('seller');
            $grid->column('sid');
            $grid->column('status');
            $grid->column('uid');
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
        return Show::make($id, new Order(), function (Show $show) {
            $show->field('id');
            $show->field('adress');
            $show->field('discount');
            $show->field('expFee');
            $show->field('fee');
            $show->field('finalFee');
            $show->field('orderNum');
            $show->field('orderSn');
            $show->field('realPay');
            $show->field('seller');
            $show->field('sid');
            $show->field('status');
            $show->field('uid');
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
        return Form::make(new Order(), function (Form $form) {
            $form->display('id');
            $form->text('adress');
            $form->text('discount');
            $form->text('expFee');
            $form->text('fee');
            $form->text('finalFee');
            $form->text('orderNum');
            $form->text('orderSn');
            $form->text('realPay');
            $form->text('seller');
            $form->text('sid');
            $form->text('status');
            $form->text('uid');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
