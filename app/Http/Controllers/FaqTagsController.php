<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqTagsCreateRequest;
use App\Http\Requests\FaqTagsUpdateRequest;
use App\Models\FaqsTags;
use Illuminate\Http\Request;
use App\Exceptions\NoticeException;
use mysql_xdevapi\Exception;

class FaqTagsController extends Controller
{
    //
    public function getAll()
    {
        $faqtag=FaqsTags::all();
        if($faqtag==null){
            throw new NoticeException('Не получилось найти',103);
        }
        return $this->response('Все FAQ Tags', $faqtag);
    }
    public function get($id){
        $faqstags=FaqsTags::find($id);
        if($faqstags==null){
            throw new NoticeException('Не получилось найти с id = '.$id,404);
        }
        return $this->response('Найдено с id = '.$id, $faqstags);

    }
    public function create(FaqTagsCreateRequest $request){
        $data=[
            'faq_id'=>$request->post('faq_id'),
            'tag_id'=>$request->post('tag_id'),

        ];
        $faqstags=FaqsTags::create($data);
        return $this->response('Создано',$faqstags);

    }
    public function update($id, FaqTagsUpdateRequest $request){
        $faqtag=FaqsTags::find($id);
        if($faqtag==null){
            throw new NoticeException('Не найдено с id = '.$id,404);
        }
        $data=[
            'faq_id'=>$request->post('faq_id'),
            'tag_id'=>$request->post('tag_id'),
        ];
        $newFaqTag=$faqtag->update($data);
        return $this->response('Обновлено с id = '.$id, $faqtag);


    }
    public function delete($id){
        $faqtag=FaqsTags::find($id);
        if($faqtag==null){
            throw new NoticeException('Не найдено с id = '.$id,404);
        }
        $faqtag->delete();
        return "Succesfully deleted with id = ".$id;



    }


}
