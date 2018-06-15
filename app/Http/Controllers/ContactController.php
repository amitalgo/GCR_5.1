<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Validator;
use App\Services\ContactService;
use App\Services\OfficeService;
use App\Services\CountryService;
use App\Services\AdService;
use App\Services\TagService;
use App\Services\PageBannerService;
use App\Services\SolutionTypeService;
use App\Services\ProductService;
use App\Services\VerticalService;
use App\Services\SolutionPartnerService;
class ContactController extends Controller
{
    protected $contactService,$officeService,$countryService,$verticalService;
    protected $adService,$pageBannerService,$solutionTypeService,$productService;
    protected $route,$page_id,$content,$banner,$solutions,$abouts,$video,$partner;
    public function __construct(ContactService $contactService,OfficeService $officeService,CountryService $countryService,TagService $tagService,VerticalService $verticalService,PageBannerService $pbs,SolutionPartnerService $partner)
    {
        $this->contactService = $contactService;
        $this->officeService = $officeService;
        $this->tagService = $tagService;
        $this->countryService =$countryService;
        $this->verticalService = $verticalService->getIsActive();
        $this->pagebnrsrv = $pbs;
        $this->partner = $partner;
    }
    public function index(){

        $this->route = Route::current();
        $route_name = strpos($this->route->getName(), ".") !== false?substr($this->route->getName(),0 ,strpos($this->route->getName(), ".")):$this->route->getName();

        $this->page_id = $this->pagebnrsrv->getPageId($route_name);

        $this->content = $this->pagebnrsrv->getPageContent($this->page_id);
       $this->banner = $this->pagebnrsrv->getPageBanner($this->page_id);


        $this->page_id = $this->pagebnrsrv->getPageId('about-GCR');
        $this->abouts = $this->pagebnrsrv->getPageContent($this->page_id);


        $offices = $this->officeService->getAllOffices();
        $countries = $this->countryService->getAllActiveCountry();
        $content = $this->content;
        $banner = $this->banner;

        $abouts = $this->abouts;
        return view('front-end.contact',compact('offices','countries','content','banner','abouts'));
    }
//    public  function send(Request $request){
//
//        $req = $this->validate($request,[
//            "firstName" => "required",
//            "lastName" => "required",
//            "email" => "required|email",
//            "industry" => "required",
//            "country" => "required",
//            "company" => "required",
//            // "company-size" => "required",
//            "number" => "required",
//            "address" => "required",
//            "topic" => "required",
//            "interested" => "required",
//            'g-recaptcha-response' => 'required|captcha',
//        ]);
//      //  $request->session()->put('popupKey', '1');
//        $result = $this->contactService->contactSaveAndSend($request);
//        if($result){
//            return redirect()->route('thankyou')->with('success-msg', 'Mail Sent Successfully.');
//        }else{
//            return redirect()->back()->with('error-msg', ' Something went wrong.');
//        }
//
//    }

    public  function sendLanding(Request $request){

        $this->validate($request,[
            "firstName" => "required",
            "email" => "required|email",
            "number" => "required",
            'g-recaptcha-response' => 'required|captcha',
        ]);
        //  $request->session()->put('popupKey', '1');
        $result = $this->contactService->contactSaveAndSend($request);
        if($result){
            return redirect()->route('thankyou')->with('success-msg', 'Mail Sent Successfully.');
        }else{
            return redirect()->back()->with('error-msg', ' Something went wrong.');
        }

    }
    public  function send(Request $request){

        $this->validate($request,[
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required|email",
            "country" => "required",
            "company" => "required",
            "number" => "required",
            "address" => "required",
            //"g-recaptcha-response" => 'required|captcha',
        ]);
        //  $request->session()->put('popupKey', '1');
        $result = $this->contactService->contactSaveAndSend($request);
        if($result){
            return redirect()->route('thankyou')->with('success-msg', 'Mail Sent Successfully.');
        }else{
            return redirect()->back()->with('error-msg', ' Something went wrong.');
        }

    }

    public function supportIndex(AdService $adService,PageBannerService $pageBannerService,ProductService $productService){
        $this->adService = $adService;
        $this->pageBannerService =  $pageBannerService;
        $this->productService = $productService;

        $this->route = Route::current();
        $route_name = strpos($this->route->getName(), ".") !== false?substr($this->route->getName(),0 ,strpos($this->route->getName(), ".")):$this->route->getName();
        $this->page_id = $this->pageBannerService->getPageId($route_name);
        $this->content = $this->pageBannerService->getPageContent($this->page_id);
        $this->banner = $this->pageBannerService->getPageBanner($this->page_id);


        $this->page_id = $this->pageBannerService->getPageId('about-GCR');
        $this->abouts = $this->pageBannerService->getPageContent($this->page_id);


        $offices = $this->officeService->getAllOffices();
        $countries = $this->countryService->getAllActiveCountry();
        $content = $this->content;
        $banner = $this->banner;

        $abouts = $this->abouts;
        return view('front-end.support',compact('offices','countries','content','banner','abouts'));
    }

    public function supportSend(Request $request){
        $req = Validator::make($request->all(),[
            "customerName" => "required",
            "partnerName" => "required",
            "email" => "required|email",
            "support" => "required",
            "prodDescription" => "required",
            "probDescription" => "required",
            "number" => "required",
             'g-recaptcha-response' => 'required|captcha',
        ]);

        $result = $this->contactService->supportSaveAndSend($request);
        if($result){
            return redirect()->back()->with('success-msg', ' Send successfully.');
        }else{
            return redirect()->back()->with('error-msg', ' Something went wrong.');
        }
    }


    public function inquiresend(Request $request){

        $result = $this->contactService->InquireSaveAndSend($request);
        if($result){
            return redirect()->back()->with('success-msg', ' Send successfully.');
        }else{
            return redirect()->back()->with('error-msg', ' Something went wrong.');
        }
    }

    public function popupForm(){
         $countries = $this->countryService->getAllActiveCountry();
        return view('front-end.form.popUpContact',compact('countries'));
    }

     public function partnersPopUp($id){
        $partner = $this->partner->getActiveSolutionPartner($id);
        return view('front-end.component.partnerpop',compact('partner'));
    }

     public function thankyou(){
        $this->page_id = $this->pagebnrsrv->getPageId('about-GCR');
        $this->abouts = $this->pagebnrsrv->getPageContent($this->page_id);
             $abouts = $this->abouts;
         return view('front-end.thankyou',compact('abouts'));
    }
}
