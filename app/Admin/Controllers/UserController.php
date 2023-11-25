<?php

namespace App\Admin\Controllers;

use App\Models\User;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class UserController extends AdminController
{
    protected $title = 'Users';

    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('user_id', __('User ID'));
        $grid->column('username', __('Username'));
        $grid->column('user_email', __('Email'));
        $grid->column('email_verified_at', __('Email Verified At'));
        $grid->column('password', __('Password'));
        $grid->column('token', __('Token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('user_id', __('User ID'));
        $show->field('username', __('Username'));
        $show->field('user_email', __('Email'));
        $show->field('email_verified_at', __('Email Verified At'));
        $show->field('password', __('Password'));
        $show->field('token', __('Token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new User());

        $form->text('username', __('Username'));
        $form->text('user_email', __('Email'));
        $form->datetime('email_verified_at', __('Email Verified At'))->default(now());
        $form->password('password', __('Password'));
        $form->text('token', __('Token'));

        return $form;
    }
}
