<?php

function json_response( $message, $status_code = 200)
{
	return response()->json( [ 'message' => $message ], $status_code );
}