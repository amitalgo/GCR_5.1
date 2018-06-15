<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 16/02/2018
 * Time: 5:54 PM
 */

namespace App\Services\Impl;

use App\Entities\ProductInquiry;
use App\Services\ContactService;
use App\Repositories\ContactRepo;
use App\Entities\ContactBackup;
use App\Entities\Support;
use Illuminate\Support\Facades\Mail;
use App\Repositories\ProductNewSchemaRepo;
class ContactServiceImpl implements ContactService
{
    protected $contactRepo,$prodrepo;
    public function __construct(ContactRepo $contactRepo,ProductNewSchemaRepo $prodrepo)
    {
        $this->contactRepo = $contactRepo;
        $this->prodrepo = $prodrepo;
    }

    public function contactSaveAndSend($data)
    {
        $contactService = new ContactBackup();
        $contactService->setFirstName($data->get('firstName'));
        $contactService->setLastName($data->get('lastName'));
        $contactService->setEmail($data->get('email'));
        $contactService->setCompanyName($data->get('company'));
        $contactService->setIndustry($data->get('industry'));
        $contactService->setInterested($data->get('interested'));
        $contactService->setCountry($data->get('country'));
        $contactService->setTopic($data->get('topic'));
        $contactService->setWebsite($data->get('website'));
        $contactService->setOfficeNumber($data->get('number'));
        $contactService->setAddress($data->get('address'));
        $contactService->setCreatedAt(new \DateTime());
        Mail::send(['html'=>'mail.contactmail'],['data'=>$data],function($message) use ($data){
            $message->to('sales.india@gcrcloud.com','To Admin')->subject('GCR : Contact');
            $message->from('sales.india@gcrcloud.com','GCR');
        });
        return $this->contactRepo->contactSaveAndSend($contactService);
    }
    public function supportSaveAndSend($data){
        $support = new Support();
        $support->setCustomerName($data->get('customerName'));
        $support->setPartnerName($data->get('partnerName'));
        $support->setEmail($data->get('email'));
        $support->setNumber($data->get('number'));
        $support->setSupport($data->get('support'));
        $support->setProbDescription($data->get('probDescription'));
        $support->setProdDescription($data->get('probDescription'));
        $support->setCreatedAt(new \DateTime());
        Mail::send(['html'=>'mail.supportmail'],['data'=>$data],function($message) use ($data){
            $message->to('support.india@gcrcloud.com','To Suport')->subject('GCR : Support');
            $message->from('support.india@gcrcloud.com');
        });
        return $this->contactRepo->contactSaveAndSend($support);
    }

    public function InquireSaveAndSend($data){
        $inquire = new ProductInquiry();
        $inquire->setFirstName($data->get('firstName'));
        $inquire->setLastName($data->get('lastName'));
        $inquire->setTitle($data->get('title'));
        $inquire->setCompanyName($data->get('company'));
        $inquire->setWebsite($data->get('website'));
        $inquire->setProductId($this->prodrepo->getProduct($data->get('pid')));
        $inquire->setDescription($data->get('description'));
        $inquire->setEmail($data->get('email'));
        $inquire->setCountry($data->get('country'));
        $inquire->setMobile($data->get('mobile'));
        $inquire->setPhone($data->get('number'));
        $inquire->setAddDate(new \DateTime());

        if($this->contactRepo->contactSaveAndSend($inquire)){
            Mail::send(['html'=>'mail.leadmail'],['data'=>$data],function($message) use ($data){
                $message->to('support.india@gcrcloud.com','To Admin')->subject('GCR : Inquiry');
                $message->from('support.india@gcrcloud.com');
            });
            return true;
        }



    }
    public function getAllContact()
    {
        return $this->contactRepo->getAllContact();
    }

    public function getContactById($id)
    {
        return $this->contactRepo->getContactById($id);
    }

    public function getAllSupport()
    {
       return $this->contactRepo->getAllSupport();
    }

    public function getSupportById($id)
    {
        return $this->contactRepo->getSupportById($id);
    }
}