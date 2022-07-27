<?php 

    if(!function_exists("sayHello")){

        function sayHello($name){

            return "Hello $name";
        } 
    }

    function sendSuccessResponse($result,$message,$code)
    {
        $response = [
            'success' => true,
            'code' => $code,
            'message' => $message,
            'result' => $result
        ];

        return response()->json($response,200);
    }

    function sendErrorResponse($message, $errorMessage = [], $code)
    {
        $response = [
            'success' => true,
            'code' => $code,
            'message' => $message,
        ];

        if(!empty($errorMessage)){
            $response['error'] = $errorMessage;
        }

        return response()->json($response,404);
    }


   

?>