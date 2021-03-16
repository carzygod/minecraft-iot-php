<?php

use Encore\Admin\Auth\Permission;
use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->column('id','ID')->sortable();
            $grid->column('phone','手机号');
            $grid->column('relName','真实姓名');
            $grid->column('nickname','微信名');
            $grid->column('created_at','创建日期');
            $grid->disableCreateButton();
            $grid->export();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->rightSide();
                $filter->equal('id', '用户ID');
                $filter->like('realname', '姓名关键字');
                $filter->like('phone', '用户手机号');
                $filter->like('nickname', '微信名');
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
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id','ID');
            $show->field('phone','手机号');
            $show->field('relName','真实姓名');
            $show->field('nickname','微信名');
            $show->field('created_at','创建日期');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new User(), function (Form $form) {
            $form->display('id','ID');
            $form->text('level');
            $form->text('name');
            $form->text('email');
            $form->text('phone','手机号');
            $form->text('relName','真实姓名');
            $form->text('email_verified_at');
            $form->text('phone_verified_at');
            $form->text('password');
            $form->text('status');
            $form->text('head');
            $form->text('nickname','微信名');
            $form->text('remember_token');
        
            $form->display('created_at','创建日期');
            $form->display('updated_at');
        });
    }
}
