<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqCreateRequest;
use App\Http\Requests\FaqUpdateRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Exceptions\NoticeException;
use mysql_xdevapi\Exception;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $faq=Faq::all()->where('is_active',true);
       if($faq==null){
           throw new NoticeException('Не Получилось Найти','103');
       }
       return $this->response('Все FAQ',$faq);
    }


    public function create(FaqCreateRequest $request)
    {
        $data = [
            'category_id' => $request->post('category_id'),
            'question' => $request->post('question'),
            'answer' => $request->post('answer'),
            'is_active' => $request->post('is_active'),
            'sort_weight'=>$request->post('sort_weight'),
            'created_at'=>$request->post('created_at'),
            'updated_at'=>$request->post('updated_at')

        ];
        $faq=Faq::create($data);
        return $this->response('Создано',$faq);
    }


    public function update($id, FaqUpdateRequest $request)
    {
        $data = [
            'category_id' => $request->post('category_id'),
            'question' => $request->post('question'),
            'answer' => $request->post('answer'),
            'is_active' => $request->post('is_active'),
            'sort_weight'=>$request->post('sort_weight'),
            'created_at'=>$request->post('created_at'),
            'updated_at'=>$request->post('updated_at')

        ];
        $faq=Faq::find($id);
        if($faq==null){
            throw new NoticeException('Не найдено с id = '.$id, 404);
        }
        $result=$faq->update($data);
        $final=Faq::find($id);
        if(!$result){
            throw new NoticeException('Не получилось обновить', 103);
        }
        return $this->response('Обновлено с id = '.$id, $final);
    }


    public function get($id)
    {
        $faq=Faq::where('id', $id)->with('tags')->first();
        if($faq==null){
            throw new NoticeException('Не найдено с id = '.$id, 404);
        }
        return $this->response('Найдено с id = '.$id, $faq);
    }





    public function delete($id)
    {
        $faq=Faq::find($id);
        if($faq==null){
            throw new NoticeException('Не найдено с id = '.$id,404);
        }
        $faq->delete();
        return $this->response('Успешно удалено с id = '.$id, $faq);

    }
}
