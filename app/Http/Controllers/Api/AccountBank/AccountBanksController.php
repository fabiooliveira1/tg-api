<?php

namespace App\Http\Controllers\Api\AccountBank;

use Illuminate\Http\Request;
// use App\Product;
// use App\Product_line;
// use App\Http\Controllers\Controller;
// use App\Repositories\BillsRepository;
use App\Models\AccountBank;


class AccountBanksController extends Controller
{
public function index(){
return "Retorna tudo";
}

public function show(AccountBank $accountBank){
return "Retorna um item";
}

public function store(){
//
}

public function edit(AccountBank $accountBank){
return view(‘product_edit’);
}

public function update(AccountBank $accountBank, Request $request){
//
}

public function destroy(AccountBank $accountBank){
//
}
}