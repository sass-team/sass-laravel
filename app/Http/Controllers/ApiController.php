<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends Controller
{
    /**
     * @SWG\Swagger(
     *     schemes={"http"},
     *     host="138.68.107.115",
     *     basePath="/v2",
     *     @SWG\Info(
     *         version="1.0.0",
     *         title="Swagger SASS",
     *         description="API docs for the SASS App Api",
     *         termsOfService="http://swagger.io/terms/",
     *         @SWG\Contact(
     *             email="r.dokollari@gmail.com"
     *         ),
     *         @SWG\License(
     *             name="Apache 2.0",
     *             url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *         )
     *     ),
     *     @SWG\ExternalDocumentation(
     *         description="Find out more about Swagger",
     *         url="http://swagger.io"
     *     )
     * )
     */
}
