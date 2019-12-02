<?php

namespace App\Http\Controllers\General\Product;

use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\ApiHelper as Api;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }
    /**
     * @api {get} /projects Request all products
     * @apiName GetProducts
     * @apiGroup Products
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *         "success": true,
     *          "payload": [
     *              {
     *                 "name": "Iphone",
     *                 "description": "Sample description",
     *                 "price": 20000
     *                 "stock": 10
     *                 "discount": 5
     *               }
     *          },
     *          "message": "Returned all product
     *     }
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
//        return Api::sendResponse( ProductResource::collection(Product::all()), 'Returned all products');
        return Api::sendResponse(ProductCollection::collection(Product::paginate(20)), 'Returned all Products');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRequest $request)
    {
        //
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->detail = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->discount = $request->discount;

            if ($product->save()) {
                return Api::sendResponse(new ProductResource($product), 'Returned');
            }
        } catch (\Exception $e) {
            return Api::sendError($e->getMessage(), [], 503);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return Api::sendResponse(new ProductResource($product), 'Returned all products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        //
        $request['detail'] = $request->description;
        unset($request['description']);
        $product->update($request->all());
        return Api::sendResponse($product, 'Sucessfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        //
        if ($product->delete()) {
            return Api::sendResponse([], 'Product has been deleted');
        } else {
            return Api::sendError('Ooops there was an internal error', 'An error Occured while deleteing', 503);
        }
    }
}
