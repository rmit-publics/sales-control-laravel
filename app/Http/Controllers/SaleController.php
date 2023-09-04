<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use App\UseCases\Sale\CreateSaleUseCase;

class SaleController extends Controller
{
    private $createSaleUseCase;
    public function __construct() {
        $this->createSaleUseCase = new CreateSaleUseCase();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
        $sales = Sale::auth()->get();
        $managers = $user->getMenagers();
        return view('sales.list-sales',
            [
                'sales' => $sales,
                'managers' => $managers,
            ]
        );
    }

    public function search(Request $request) {
        $user = new User();
        $sales = Sale::auth()
            ->when($request->input('date_ini') != null && $request->input('date_end') != null,
                function($query) use($request) {
                    $query->whereBetween('created_at', [$request->input('date_ini'), $request->input('date_end')]);
                }
            )
            ->when($request->input("manager_id") != null, function($query) use($request) {
                $seller = new User();
                $store = Store::where("manager_id", $request->input("manager_id"))->first();
                $sellers = $seller->getSellers($store->id);
                $sellersId = collect($sellers)->pluck('id')->toArray();
                $query->where('seller_id', $sellersId);
            })
            ->when($request->input("store_id") != null, function($query) use($request) {
                $seller = new User();
                $sellers = $seller->getSellers($request->input("store_id"));
                $sellersId = collect($sellers)->pluck('id')->toArray();
                $query->where('seller_id', $sellersId);
            })
            ->when($request->input("seller_id") != null, function($query) use($request) {
                $query->where('seller_id',$request->input("seller_id"));
            })
        ->get();

        $managers = $user->getMenagers();
        return view('sales.list-sales',
            [
                'sales' => $sales,
                'managers' => $managers,
            ]
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create-sale');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->createSaleUseCase->execute($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('sales.edit-sale', ['sale'=>$sale]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
