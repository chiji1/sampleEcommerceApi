<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019-12-01
 * Time: 14:52
 */

namespace App\Exceptions;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Response;
use App\Helper\ApiHelper as Api;

trait ExceptionTrait
{
    public function apiException($request, $e){
        if ($e instanceof ModelNotFoundException) {
            return Api::sendError('Model not found', [], Response::HTTP_NOT_FOUND);
        }
        if ($e instanceof NotFoundHttpException) {
            return Api::sendError('Requested route not found', [], Response::HTTP_NOT_FOUND);
        }
    }
}