<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
class Slider extends Model
{

    protected $fillable = ['slider_image', 'slider_title', 'slider_description', 'publication_status'];



    private function ImageUploaded($sliderImage){
        $imageName   = $sliderImage->getClientOriginalName();
        $directory   = 'slider-images/';
        $sliderImage->move($directory, $imageName);

        return $directory.$imageName;
    }

    public static function sliderImageUploadInfo($request){

        // Validation

        $roles = [

            'slider_image' => 'required|unique:sliders,slider_image',
            'slider_title' => 'required|unique:sliders,slider_title',
            'slider_description' => 'required',
            'publication_status' => 'required',

        ];

        $validator = Validator::make($request->all(), $roles);

        if ($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Database insert

        $slider = new Slider();

        $slider->slider_image       = $slider->ImageUploaded($request->file('slider_image'));
        $slider->slider_title       = $request->slider_title;
        $slider->slider_description = $request->slider_description;
        $slider->publication_status = $request->publication_status;
        $slider->save();

        Session()->flash('type', 'success');
        Session()->flash('message', 'Save Slider Info Successfully');

    }

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected static function sliderImageUpload($request){
        // Validation

        $roles = [

            'slider_image' => 'required',
            'slider_title' => 'required',
            'slider_description' => 'required',
            'publication_status' => 'required',

        ];

        $validator = Validator::make($request->all(), $roles);

        if ($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Database insert
        $slider      = Slider::find($request->id);
        $sliderImage = $request->file('slider_image');

        if ($sliderImage){
            if(file_exists($slider->slider_image)){

                unlink($slider->slider_image);
            }
        }


        if($sliderImage) {
            $slider->slider_image   = $slider->ImageUploaded($sliderImage);
        }
        $slider->slider_title       = $request->slider_title;
        $slider->slider_description = $request->slider_description;
        $slider->publication_status = $request->publication_status;
        $slider->save();

        Session()->flash('type', 'success');
        Session()->flash('message', 'Save Slider Info Successfully');
    }






}
