<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\JsonResponse;

trait MessageTrait
{
    public function SuccessMessage($route,$msg )
    {
        return redirect ()->route ($route)
            ->with('success', __('message.Data') . ' ' . __('message.HasBeen') . ' ' . $msg . ' ' . __('message.successfully'));
    }
    public function ErrorMessage($route,$msg )
    {
        return redirect ()->route ($route)
            ->with('error', __('message.Data') . ' ' . $msg . ' ' . __('message.failed'));
    }
    public function returnData($value, $msg): JsonResponse
    {
        return response()->json(
            [
                'Data' => $value,
                'status' => true,
                'stateNum' => '201',
                'msg' => $msg
            ]
        )->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', '*');
    }
    public function returnError($stateNum, $msg): JsonResponse
    {
        return response()->json(
            [
                'status' => false,
                'stateNum' => $stateNum,
                'msg' => $msg
            ])->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', '*');
    }
}
