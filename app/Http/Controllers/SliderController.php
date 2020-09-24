<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Validator;
use function GuzzleHttp\Promise\all;

class SliderController extends Controller
{

    public function addSliderInfo(){

        return view('backend.pages.slider.add-slider');
    }

    public function saveSliderInfo(Request $request){

        Slider::sliderImageUploadInfo($request);
        return redirect()->back();


    }

    public function manageSliderInfo(){

        return view('backend.pages.slider.manage-slider', [

            'sliders' => Slider::all()

        ]);
    }

    public function unpublishedSliderInfo($id){
        $slider = Slider::find($id);
        $slider->publication_status = 0;
        $slider->save();

        Session()->flash('type', 'success');
        Session()->flash('message', 'Slider Info Unpublished');
        return redirect()->back();

    }


    public function publishedSliderInfo($id){
            $slider = Slider::find($id);
            $slider->publication_status = 1;
            $slider->save();

            Session()->flash('type', 'success');
            Session()->flash('message', 'Slider Info Published');
            return redirect()->back();

        }


        public function editSliderInfo($id){

            $slider = Slider::find($id);

            return view('backend.pages.slider.edit-slider', ['slider' => $slider]);

        }

        public function updateSliderInfo(Request $request){

            Slider::sliderImageUpload($request);

            return redirect()->back();

        }

        public function deleteSliderInfo($id){
                $slider = Slider::find($id);
                $slider->delete();
            Session()->flash('type', 'success');
            Session()->flash('message', 'Delete Slider Info Successfully.');
            return redirect()->back();
        }



}
