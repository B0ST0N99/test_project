<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\Traits\Responseable;

/**
 * @OA\Info(
 *     title="Laravel Swagger API documentation",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="admin@example.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Tag(
 *     name="Admins",
 *     description="Routes for admin",
 * )
 * @OA\Tag(
 *     name="Users",
 *     description="Routes for user",
 * )
 * @OA\Server(
 *     description="Laravel Swagger API server",
 *     url=L5_SWAGGER_CONST_HOST
 * )
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     name="X-APP-KEY",
 *     securityScheme="X-APP-KEY"
 * )
 *
 */
class Controller extends BaseController
{
    use Responseable;
}
