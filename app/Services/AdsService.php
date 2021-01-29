<?php

namespace App\Services;

use App\Models\PostImage;
use App\Repositories\AdsRepository;
use App\Repositories\UserRepository;
use Exception;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Traits\UploadTrait;

class AdsService
{
    use UploadTrait;
    protected $article;
    protected $adsRepository;
    protected $request;


    function chain($request, $article)
    {
        $this->article = $article;
        $this->adsRepository = new AdsRepository();
        $this->request = $request;


//        if ($request->isMethod('post')) {
//
//        }

        $this->prepareImages();

        if (isset($request['attrs']) && !empty($request['attrs'])):
            $this->setNewRelations('Attrs', $request['attrs'], $article);
        endif;

        if (isset($request['categories']) && !empty($request['categories'])):
            $this->setNewRelations('Categories', $request['categories'], $article);
        endif;

        if (isset($request['tags']) && !empty($request['tags'])):
            $this->setNewRelations('Tags', $request['tags'], $article);
        endif;


        return true;
    }

    function setNewRelations($name, $relation, $article = null){
        $method = 'setRelation' . $name;
            if(!$this->adsRepository->$method($relation, $article))
                $this->fail('Ошибка при создании связи');
    }

    function fail($msg = 'Ошибка сохранения файла'){
        throw new  \Exception($msg);
    }


    function uploadChain($request, $article){
        $this->article = $article;
        $this->adsRepository = new AdsRepository();
        $this->request = $request;
        // Удаляем картинки если они пришли
        $this->prepareImages();
//        if(!empty($inputs["remove"]))
//            $this->deleteMediaItem(json_decode($inputs["remove"]),  $ads);
        return true;
    }
}
