<?php

namespace App\Http\Controllers\Dashboard\Receipt;

use App\Http\Controllers\Controller;
use App\interfaces\Finance\ReceiptRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptAccountController extends Controller
{
    protected $Receipt;

    public function __construct(ReceiptRepositoryInterface $Receipt)
    {
        $this->Receipt = $Receipt;
    }


    public function index()
    {
        return $this->Receipt->index();
    }

    public function create()
    {
        return $this->Receipt->create();
    }


    public function store(Request $request)
    {
       return $this->Receipt->store($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $this->Receipt->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Receipt->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Receipt->destroy($request);
    }
}
