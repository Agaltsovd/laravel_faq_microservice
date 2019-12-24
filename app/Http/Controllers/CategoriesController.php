<?php

namespace App\Http\Controllers;

use App\Exceptions\NoticeException;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getAll(Request $request)
    {
        $categories = Category::all()->where('is_active', true);

        if ($categories == null) {
            throw new NoticeException('Не Получилось Найти', 404);
        }


        return $this->response('Все Категории', $categories);
    }

    public function getAllWithFaq(Request $request)
    {
        $categories = Category::where('is_active', '=', true)->with('faqs')->get();

        if($categories==null){
            throw new NoticeException('Не Получилось Найти', 404);
        }


        return $this->response('Все Категории',$categories);
    }

    public function get($id)
    {
        $category = Category::findOrFail($id);

        /*if($category==null){
            throw new NoticeException('Не Найдено c id = '.$id,404);
        }*/

        return $this->response('Категория', $category);
    }

    public function create(CategoryCreateRequest $request)
    {
        $data = [
            'name' => $request->post('name'),
            'is_active' => $request->post('is_active'),
            'sort_weight' => $request->post('sort_weight'),
            'icon_url' => $request->post('icon_url'),
        ];

        $categories=Category::create($data);
        return $this->response('Создано',$categories);

//        $category = new Category();
//
//        $category->name = $request->post('name');
//        $category->is_active = $request->post('is_active');
//        $category->sort_weight = $request->post('sort_weight');
//        $category->icon_url = $request->post('icon_url');


//        $category->save();

//        $category = Category::create($data);
//
//        return response()->json([
//            'data' => $category
//        ]);
    }
    public function update($id, CategoryUpdateRequest $request)
    {
        $data = [
            'name' => $request->post('name'),
            'is_active' => $request->post('is_active'),
            'sort_weight' => $request->post('sort_weight'),
            'icon_url' => $request->post('icon_url'),
        ];

        $category=Category::find($id);
        if($category==null){
            throw new NoticeException('Не найдено с id = '.$id, "404");
        }
        $result =$category->update($data);

//        return response()->json([
//            'data' => $result
//        ]);
        if(!$result){
            throw new NoticeException('Не получилось обновить', 103);
      }
        return $this->response('Обновлено c id = '.$id, $category);
    }

    public function delete($id)
    {
        $category=Category::find($id);
        if($category==null){
            throw new NoticeException('Не Найдено',404);
        }
      $category->delete();

      return $this->response('Удалено с id = '.$id, $category);

    }
}
