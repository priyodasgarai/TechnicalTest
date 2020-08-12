<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\model\import;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Imports\ImportsImportr;
use Maatwebsite\Excel\Facades\Excel;

class postController extends Controller {

    private $result = 0;
    private $message = 0;
    private $details = 0;
    private $validator_error = 0;

    public function create(Request $request) {
        if ($request->isMethod('post')) {
            $video = "";
            $poster_image = "";
            $validator = Validator::make($request->all(), [
                        'CSV_File' => 'required|max:2048', //|mimes:csv
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            if (Excel::import(new ImportsImportr, request()->file('CSV_File'))) {
                Session::put('flash_message', 'Post import Successfully');
                return redirect('/');
            } else {
                return Redirect::back()->withErrors(['message' => trans('messages.6')]);
            }
        } else {
            return view('admin-view.addPosts');
        }
    }

    public function post_get() {
        $posts = import::all();
        return view('admin-view.posts', ['posts' => $posts]);
    }

    public function post_edit($request) {
        $val = explode("||", base64_decode($request));
        $id = $val[0];
        $details = import::findOrFail($id);
        return view('admin-view.editPosts', ['post' => $details]);
    }

    public function post_edit_submit(Request $request, $id) {
        $validator = Validator::make($request->all(), ['post_id' => 'required']);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $post_details = import::findOrFail($request->input('post_id'));
        if (!empty($post_details)) {
            $post_details->lot_no = (!empty($request->input('lot_no'))) ? $request->input('lot_no') : $post_details->lot_no;
            $post_details->price = (!empty($request->input('price'))) ? $request->input('price') : $post_details->price;
            $post_details->status = (!empty($request->input('status'))) ? $request->input('status') : $post_details->status;
            $post_details->phase = (!empty($request->input('phase'))) ? $request->input('phase') : $post_details->phase;
            if ($post_details->save() == true) {
                Session::put('flash_message', trans('messages.10'));
                return redirect('/');
            } else {
                Session::put('flash_message', trans('messages.11'));
                return redirect('/');
            }
        } else {
            Session::put('flash_message', trans('messages.7'));
            return redirect('/')->back();
        }
    }

    public function bulk_update(Request $request) {
        $validator = Validator::make($request->all(), ['id' => 'required']);
        if ($validator->fails()) {
            $this->result = FALSE;
            $this->message = trans('messages.13');
            $this->validator_error = $validator->errors();
        } else {
            $data = array();
            if (!empty($request->input('lot_no'))) {
                $data['lot_no'] = $request->input('lot_no');
            }if (!empty($request->input('price'))) {
                $data['price'] = $request->input('price');
            }if (!empty($request->input('status'))) {
                $data['status'] = $request->input('status');
            }if (!empty($request->input('phase'))) {
                $data['phase'] = $request->input('phase');
            }
            $result = import::whereIn('id', $request->input('id'))
                    ->update($data);
            if ($result) {
                $this->result = true;
                $this->message = trans('messages.10');
            } else {
                $this->result = FALSE;
                $this->message = trans('messages.43');
            }
        }
        return Response::make([
                    'result' => $this->result,
                    'message' => $this->message,
                    'validator_error' => $this->validator_error,
                    'image_path' => url(trans('labels.8')),
                    'details' => $this->details
        ]);
    }

}
