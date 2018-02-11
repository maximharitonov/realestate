<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

abstract class AuthorizedController extends BaseController
{
//    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;
    protected $model;

    public function __construct(string $model)
    {
        $this->user         =   Auth::user();
        $this->model        =   $model;
    }

    protected function index(Request $request)
    {
        return $this->model::all();
    }

    protected function get(Request $request)
    {
        return $this->model::find($request->get('id'));
    }

    protected function update(Request $request)
    {
        $item = $this->model::find($request->get('id'));

        if ($item) {
            foreach ($request->get('data') as $column => $value) {
                $item->{$column}    =   $value;
            }

            $item->update();
        }

        return $item;
    }

    protected function delete(Request $request)
    {
        $item = $this->model::find($request->get('id'));

        return $item ? $item->delete() : false;
    }

    protected function create(Request $request)
    {
        return $this->model::create($this->properties($request));
    }

    protected function validate(Request $request, array $policies)
    {
        return Validator::make($request->only('data'), $policies)->validate();
    }

    private function properties(Request $request)
    {
        return array_merge(
            [ 'referrer_id' =>  Auth::id() ],
            array_reduce($request->only('data'), function ($carry, $item) {
                return $item;
            })
        );
    }
}
