<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use App\lib\ResponseCode;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (UserException $e) {
            //pass
        })->stop();

        $this->reportable(function (NotFoundHttpException $e) {
            //pass
        })->stop();

        $this->renderable(function (UserException $e, $request) {
            $code = ResponseCode::BAD_RESULT;
            if($e->getCode() != 0) {
                $code = $e->getCode();
            }
            return response()->json([
                'code'       => $code,
                'data'       => null,
                'message'    => $e->getMessage(),
                'request_id' => getRequestId(),
            ]);
        });

        $this->renderable(function (ValidationException $e, $request) {
            $errorinfo = array_slice($e->errors(),0,1,false);
            $errmsg = array_column($errorinfo,0)[0];

            return response()->json([
                'code'       => ResponseCode::BAD_PARAM,
                'data'       => null,
                'message'    => 'Invalid params: '.$errmsg,
                'request_id' => getRequestId(),
            ]);
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            return response()->json([
                'code'       => 404,
                'data'       => null,
                'message'    => 'Page Not Found',
                'request_id' => getRequestId(),
            ],404);
        },);

        $this->renderable(function (Throwable $e, $request) {
            $isDebug = env('APP_DEBUG');
            $message = '';
            if($isDebug){
                $message = explode("\n", (string)$e,2)[0];
            }else{
                $message = 'Internal Server Error';
            }
            return response()->json([
                'code'       => 500,
                'data'       => null,
                'message'    => $message,
                'request_id' => getRequestId(),
            ], 500);
        });
    }
}
