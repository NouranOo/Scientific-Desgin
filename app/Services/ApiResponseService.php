<?php
/**
 * Created by PhpStorm.
 * User: mallahsoft
 * Date: 14/01/18
 * Time: 09:25 م
 */

namespace App\Services;

use Response;

class ApiResponseService
{

    /**
     * @var Request
     */
    protected $request;


    /**
     * @var array
     */
    protected $body;


    public function __construct()
    {
        //$this->response = $response;
        //$this->initialize();
    }


    /**
     * Set response data.
     *
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->body['data'] = $data;
        return $this;
    }



    public function setError($error)
    {
        $this->body['status'] = 'error';
        $this->body['message'] = $error;
        return $this;
    }

    public function setSuccess($message)
    {
        $this->body['status'] = 'success';
        $this->body['message'] = $message;
        return $this;
    }

    public function setCode($code)
    {
        $this->body['code'] = $code;
        return $this;
    }


    public function send()
    {
        //return $this->response->json();
        //return response()->json();
        return response()->json($this->body);

    }

    public function sendCollection($collection,$code)
    {
        //return $this->response->json();
        //return response()->json();
        return response()->json($collection,200);

    }


//    private function initialize()
//    {
//        $body = [
//            'data' => [],
//        ];
//
//        $this->body = $body;
//    }


}