<?php


namespace App\Http\Controllers\Traits;


use Illuminate\Http\JsonResponse;

trait Responseable
{
    /**
     * @param $message
     * @param mixed $key
     * @param int $status
     * @return JsonResponse
     */
    public function invalidate($message, $key = null, $status = 422)
    {
        $data = [
            'success' => false,
            'message' => $message,
        ];

        if ($key) $data['errors'][$key][] = $message;

        return response()->json($data, $status);
    }


    /**
     * @param string $message
     * @param int $status
     * @param mixed $data
     * @return JsonResponse
     */
    public function success($message = '', $data = null, $status = 200)
    {
        $responseData = [
            'success' => true,
        ];

        if ($data !== null) $responseData['data'] = $data;
        if ($message !== '') $responseData['message'] = $message;

        return response()->json($responseData, $status);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function created($data)
    {
        return $this->success('', $data, JsonResponse::HTTP_CREATED);
    }
}
