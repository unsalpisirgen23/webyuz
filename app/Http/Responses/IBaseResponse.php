<?php
/**
 * Created by PhpStorm.
 * User: backend
 * Date: 23.12.2021
 * Time: 15:50
 */

namespace App\Http\Responses;


interface IBaseResponse
{

    public function index($parameters = []);

    public function show($parameters = []);

    public function create($parameters = []);

    public function edit($parameters = []);

    public function custom($path,$parameters = []);

}
