<?php

namespace App\Http\Controllers;

use App\Exceptions\NoticeException;
use App\Http\Requests\TagsCreateRequest;
use App\Http\Requests\TagsUpdateRequest;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    public function getAll(Request $request){
      $tag=Tags::all();

      if($tag==null){
          throw new NoticeException('Не получилось найти','103');
      }
        return $this->response('Все Tags ',$tag);
    }
    public function get($id){
        $tag=Tags::find($id);
        if($tag==null){
            throw new NoticeException('Не Найдено с id ='.$id, '404');
        }
        return $this->response('Найдено с id = '.$id, $tag);
    }
    public function create(TagsCreateRequest $request){
        $data=[
            'name'=>$request->post('name')
        ];
        $tag=Tags::create($data);
        return $this->response('Создано',$tag);
    }
    public function update($id, TagsUpdateRequest $request){
        $tag=Tags::find($id);
        if($tag==null){
            throw new NoticeException('Не Найдено с id ='.$id, '404');
        }
        $data=[
            'name'=>$request->post('name')
        ];
        $tag->update($data);
        return $this->response('Обновлено с id ='.$id, $tag);
    }
    public function delete($id){
        $tag=Tags::find($id);
        if($tag==null){
            throw new NoticeException('Не найдено с id ='.$id, '404');
        }
        $tag->delete();
        return $this->response('Удалено с id ='.$id, $tag);
    }
}
