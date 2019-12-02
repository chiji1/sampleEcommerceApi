<?php

namespace App\Http\Controllers\General\Reviews;

use App\Http\Requests\Review\ReviewRequest;
use App\Http\Resources\Reviews\ReviewsResource;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\ApiHelper as Api;
use Illuminate\Http\Response;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Product $product)
    {
        //
        return Api::sendResponse(ReviewsResource::collection($product->reviews), 'Sent all Reviews');
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
     * @param ReviewRequest $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ReviewRequest $request, Product $product)
    {
        //
        try {
            $review = new Review();
            $review->customer_id = $request->customer_id;
            $review->review = $request->review;
            $review->rating = $request->rating;

            if ($product->reviews()->save($review)) {
                return Api::sendResponse([], 'Successfully added review');
            } else {
                return Api::sendError('Error Creating review', [], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (\Exception $e) {
            return Api::sendError($e->getMessage(), [], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param Review $review
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product, Review $review)
    {
        //
        $review->update($request->all());
        return Api::sendResponse($review, 'Review has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @param Review $review
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product, Review $review)
    {
        //
        if ($review->delete()) {
            return Api::sendResponse([], 'Review Deleted');
        } else {
            return Api::sendError('Could not delete Review', [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
