<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 13/06/2018
 * Time: 4:33 PM
 */

namespace App\Http\Controllers;

use App\Services\VerticalService;

class TagGeneratorController extends Controller
{
    public function __construct(VerticalService $solutionTypeService)
    {
        $this->solutionService=$solutionTypeService;
    }

    public function tagGenerator()
    {
        $this->solutionService->tagGenerator();

        echo 'Tag Generated SuccessFully............';
    }
}