<?php

if (!function_exists('successResponse')) {

    function successResponse(object $data, string $message)
    {
        return ["success" => true, "data" => $data, "message" => $message];
    }
}

if (!function_exists('errorResponse')) {

    function errorResponse(string $errorMsg)
    {
        return ["success" => false, "error" => $errorMsg];
    }
}

if (!function_exists('okResponse200')) {
    function okResponse200($data, string $message)
    {
        return response()->json(successResponse($data, $message), 200);
    }
}

if (!function_exists('resourceCreatedResponse201')) {
    function resourceCreatedResponse201($data, string $resourceName)
    {
        return response()->json(successResponse($data, $resourceName . " created successfully"), 201);
    }
}

if (!function_exists('anErrorOcurred')) {
    function anErrorOcurred()
    {
        return response()->json(errorResponse("An Error Ocurred"), 500);
    }
}


if (!function_exists('notFoundData404')) {
    function notFoundData404(string $message)
    {
        return response()->json(errorResponse($message), 404);
    }
}

if (!function_exists('badRequestResponse400')) {

    function badRequestResponse400()
    {
        return response()->json(errorResponse("Bad request"), 400);
    }
}
