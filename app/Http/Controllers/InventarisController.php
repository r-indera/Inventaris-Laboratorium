<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function amount()
    {
    	$categories = Category::paginate(4);
    	return view('dashboardInventory.inventaris', compact('categories'));
    }

    public function ready(Category $category)
    {
    	$inventories = $category->inventories()->where('status','Ready')->get();
    	return view('dashboardInventory.ready_inventories', compact('inventories'));
    }

     public function borrow(Category $category)
    {
    	$inventories = $category->inventories()->where('status','Dipinjam')->get();
    	return view('dashboardInventory.borrows_inventories', compact('inventories'));
    }

    public function repair(Category $category)
    {
    	$inventories = $category->inventories()->where('status','Perbaikan')->get();
    	return view('dashboardInventory.repair_inventories', compact('inventories'));
    }
}
