<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as CODE;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $repository;

    protected $rules;

    protected $transformer;


    public function index(Request $request)
    {
        return $this->transformer::transformCollection(
            $this->repository->index()
        );
    }

    public function get(Request $request)
    {
        $data = $request->get('id');

        return $this->transformer::extract(
            $this->repository->get($data)
        );
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, $this->rules);

        return $this->transformer::transform(
            $this->repository->create($data)
        );
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, $this->rules);

        return $this->repository->update($data);
    }


    public function delete(Request $request)
    {
        $data = $request->get('id');

        return $this->repository->delete($data);
    }
}
