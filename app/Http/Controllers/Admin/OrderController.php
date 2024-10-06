<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\OrderDataTable;

class OrderController extends Controller
{
  public function index(OrderDataTable $dataTable){

    return $dataTable->render('admin.orders.index');

  }
}
