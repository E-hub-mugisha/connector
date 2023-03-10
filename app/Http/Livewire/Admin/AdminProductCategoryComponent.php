<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductCategoryComponent extends Component
{
    use WithPagination;

    public function deleteProductCategory($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            unlink('assets/images/category/products' . '/' . $category->image);
        }
        $category->delete();
        session()->flash('message', 'Product category deleted');
    }
    public function render()
    {
        $categories = Category::paginate(12);
        return view('livewire.admin.admin-product-category-component', ['categories' => $categories])->layout('layouts.app');
    }
}
