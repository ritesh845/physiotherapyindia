<?php
 
use App\Models\Documents;
use Modules\Member\Entities\Member;


if (!function_exists('document_save')) {
    function document_save($request,$model,$user_id,$folder_name){

        $file = $request->file('qual_doc');
        $filename =  time().'_'.$file->getClientOriginalName();
        $path = $file->storeAs('public/'.date('Y').$folder_name, $filename);
        $path = date('Y').$folder_name;

        $document = [
            'user_id'   => $user_id,
            'model_id'  => $model->id,
            'size'      => $file->getSize(),
            'meme_type' => $file->getMimeType(),
            'disk'      => $path,
            'file_name' => $filename,
            'name'      => basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()),
            'model_type'=> class_basename($model),
        ];

        Documents::create($document);
    }
}

if (!function_exists('member_create')) {
    function member_create($user,$data){
        Member::create([
            'id'        => $user->id,
            'first_name'=> $data['first_name'],
            'middle_name'=> $data['middle_name'],
            'last_name' => $data['last_name'],
            'email'     => $user->email,
            'mobile'    => $user->phone,
            'regn_date' => date('Y-m-d', strtotime($user->created_at)),
        ]); 
    }
}


