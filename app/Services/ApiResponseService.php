<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as FoundationResponse;

trait ApiResponseService
{
    /**
     * 响应码
     *
     * @var int
     */
    protected $statusCode = FoundationResponse::HTTP_OK;

    /**
     * 响应数据
     */
    protected $data;

    /**
     * 响应描述
     *
     * @var string
     */
    protected $msg = 'success';

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function internalError($message = "系统内部错误!")
    {
        return $this->failed($message, FoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * @param     $message
     * @param int $code
     *
     * @return mixed
     */
    public function failed(
        $message,
        $code = FoundationResponse::HTTP_BAD_REQUEST
    )
    {
        return $this->setStatusCode($code)->setMsg($message)->respond();
    }

    /**
     * @param null  $code
     * @param array $header
     *
     * @return JsonResponse
     */
    public function respond($code = null, $header = []): JsonResponse
    {
        if ($code) {
            $this->setStatusCode($code);
        }

        $code = [
            'code' => $this->statusCode,
        ];

        $msg = [
            'msg' => $this->msg
        ];

        if ($this->data !== null) {
            $data = [
                'data' => $this->data,
            ];

            $data = array_merge($code, $data, $msg);
        } else {
            $data = array_merge($code, $msg);
        }

        return Response::json($data, $this->statusCode, $header);
    }

    /**
     * @param $statusCode
     *
     * @return $this
     */
    public function setStatusCode($statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param $msg
     *
     * @return $this
     */
    public function setMsg($msg): self
    {
        $this->msg = $msg;
        return $this;
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function notFound($message = '数据不存在!')
    {
        return $this->failed($message, Foundationresponse::HTTP_NOT_FOUND);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function forbidden($message = '请求数据验证失败!')
    {
        return $this->failed($message, Foundationresponse::HTTP_FORBIDDEN);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function unauthorized($message = '请求未认证或权限不足!')
    {
        return $this->failed($message, Foundationresponse::HTTP_UNAUTHORIZED);
    }

    /**
     * @param     $data
     * @param int $code
     *
     * @return JsonResponse
     */
    public function success($data, $code = FoundationResponse::HTTP_OK): JsonResponse
    {
        return $this->setStatusCode($code)->setData($data)->respond();
    }

    /**
     * @param $data
     *
     * @return $this
     */
    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }
}
