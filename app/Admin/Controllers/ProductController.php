<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class ProductController extends AdminController
{
    protected $title = 'Products';

    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('product_id', __('Product ID'));
        $grid->column('cat_id', __('Category ID'));
        $grid->column('brand_id', __('Brand ID'));
        $grid->column('img_id', __('Image ID'));
        $grid->column('product_name', __('Product Name'));
        $grid->column('original_price', __('Original Price'));
        $grid->column('selling_price', __('Selling Price'));
        $grid->column('ram', __('RAM'));
        $grid->column('memory', __('Memory'));
        $grid->column('system_operating', __('System Operating'));
        $grid->column('status', __('Status'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('detail', __('Detail'));
        $grid->column('orderDetails.orderDetail_id', __('Order Detail ID'))->pluck('orderDetail_id');
        $grid->column('orderDetails.quantity', __('Order Detail Quantity'))->pluck('quantity');
        $grid->column('orderDetails.total_price', __('Order Detail Total Price'))->pluck('total_price');
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('product_id', __('Product ID'));
        $show->field('cat_id', __('Category ID'));
        $show->field('brand_id', __('Brand ID'));
        $show->field('img_id', __('Image ID'));
        $show->field('product_name', __('Product Name'));
        $show->field('original_price', __('Original Price'));
        $show->field('selling_price', __('Selling Price'));
        $show->field('ram', __('RAM'));
        $show->field('memory', __('Memory'));
        $show->field('system_operating', __('System Operating'));
        $show->field('status', __('Status'));
        $show->field('quantity', __('Quantity'));
        $show->field('detail', __('Detail'));
        $show->field('orderDetails.orderDetail_id', __('Order Detail ID'))->pluck('orderDetail_id');
        $show->field('orderDetails.quantity', __('Order Detail Quantity'))->pluck('quantity');
        $show->field('orderDetails.total_price', __('Order Detail Total Price'))->pluck('total_price');
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Product());

        $form->select('cat_id', __('Category'))->options(Category::all()->pluck('category_name', 'cat_id'));
        $form->select('brand_id', __('Brand'))->options(Brand::all()->pluck('brand_name', 'brand_id'));
        $form->select('img_id', __('Image'))->options(Image::all()->pluck('image_name', 'img_id'));
        $form->text('product_name', __('Product Name'));
        $form->decimal('original_price', __('Original Price'))->default(0.00);
        $form->decimal('selling_price', __('Selling Price'))->default(0.00);
        $form->text('ram', __('RAM'));
        $form->text('memory', __('Memory'));
        $form->text('system_operating', __('System Operating'));
        $form->text('status', __('Status'));
        $form->text('quantity', __('Quantity'));
        $form->textarea('detail', __('Detail'));

        return $form;
    }
}

