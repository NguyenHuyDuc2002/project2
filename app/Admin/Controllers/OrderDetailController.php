<?php

namespace App\Admin\Controllers;

use App\Models\OrderDetail;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class OrderDetailController extends AdminController
{
    protected $title = 'Order Details';

    protected function grid()
    {
        $grid = new Grid(new OrderDetail());

        $grid->column('orderDetail_id', __('Order Detail ID'));
        $grid->column('order.order_id', __('Order ID'));
        $grid->column('product.product_id', __('Product ID'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('total_price', __('Total Price'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(OrderDetail::findOrFail($id));

        $show->field('orderDetail_id', __('Order Detail ID'));
        $show->field('order.order_id', __('Order ID'));
        $show->field('product.product_id', __('Product ID'));
        $show->field('quantity', __('Quantity'));
        $show->field('total_price', __('Total Price'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new OrderDetail());

        $form->select('order_id', __('Order'))->options(Order::all()->pluck('order_id', 'order_id'));
        $form->select('product_id', __('Product'))->options(Product::all()->pluck('product_id', 'product_id'));
        $form->text('quantity', __('Quantity'));
        $form->text('total_price', __('Total Price'));

        return $form;
    }
}
