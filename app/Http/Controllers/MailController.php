<?php

namespace App\Http\Controllers;

use App\Http\APIResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Services\Interfaces\MailServiceInterface;
use App\Helpers\Asset;


class MailController extends Controller
{
    private CustomerServiceInterface $customerServiceInterface;
    private MailServiceInterface $mailServiceInterface;
    
    public function __construct(CustomerServiceInterface $customerServiceInterface, MailServiceInterface $mailServiceInterface)
    {
        $this->middleware('basicAuth');
        $this->customerServiceInterface = $customerServiceInterface;
        $this->mailServiceInterface = $mailServiceInterface;
    }

    public function sendMail(Request $request) {

        $validate = $request->validate([            
            "from" => "required|email",
            "to" => "required",
            "content" => "required",
            "content-type" => "required"
        ]);

        $mailId =  uniqid("m_");

        $mail = array(
            "id" => $mailId,
            "from" => $request["from"],
            "to" => $request["to"],
            "cc" => !is_null($request["cc"]) ? $request["cc"] : "" ,
            "subject" => !is_null($request["subject"]) ? $request["subject"] : "" ,
            "content" => $request["content"],
            "content-type" => $request["content-type"]
        );


        
        
        $hasFilesAttached = false;
        $filesAttached = array();

        foreach($_FILES as $file) {
            if($file["error"] == 0) {
                $hasFilesAttached = true;

                $fileExtension = Asset::get_image_extension($file["name"]);
                $fileNameOnDisk = uniqid('file_') . '.' . $fileExtension;                
                $filesLocation = Asset::get_files_location();

                move_uploaded_file($file['tmp_name'], $filesLocation . $fileNameOnDisk );

                $filesAttached[] = array(
                    "id" => uniqid("f_"),
                    "fileName" => $fileNameOnDisk,
                    "filePath" => $filesLocation . $fileNameOnDisk,
                    "fileExtension" => $fileExtension,
                    "idEmail" => $mailId
                );
            }
          
        }

        $mail["hasFilesAttached"] = $hasFilesAttached;
        $mail["filesAttached"] = $filesAttached;                      

        $mail =  $this->mailServiceInterface->sendMail($mail);

        return APIResponse::response($request, 'data', $mail, 200) ;
    }

    public function findMailById(Request $request, $idMail) {
        $mail = $this->mailServiceInterface->findMailById($idMail);
        return !is_null($mail) ? APIResponse::response($request, 'data', $mail, 200) : APIResponse::error($request, "Mail not found", 404);
    }

    public function findMailByCustomer(Request $request) {
        $offset = !empty($request->get("offset")) ? $request->get("offset") : 0;
        $size = !empty($request->get("size")) ? $request->get("size") : 10;
        

        $mails = $this->mailServiceInterface->findMailByCustomer($request->get("email"));
        
        return !is_null($mails) ? APIResponse::response($request, 'data', $mails, 200) : APIResponse::error($request, "Empty result", 404);
    }

    public function search(Request $request) {
        
    }

   


    
    
}
