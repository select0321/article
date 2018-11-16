<?php
/**
 * Created by PhpStorm.
 * User: bjqxdn0575
 * Date: 2018/9/12
 * Time: 15:07
 */

namespace App\Services;


use function PhpParser\filesInDir;

class ResourceService extends BaseService
{
    public function getOne($id)
    {
        return $this->repository("resource")->find($id, ['article', 'audio', 'extension', 'feed']);
    }


    public function getPaginate()
    {
        $where = [
            'state' => 'publish',
        ];

        return $this->repository("resource")->paginate($where, 15, [
            'extension',
            'feed',
            'article' => function ($query) {
                return $query->select('resource_id', 'digest');
            }
        ], ['published_at', 'desc']);
    }


    public function store($resource, $article, $audio, $extension)
    {

        if (!$resource) {
            return false;
        }

        $old = $this->repository("resource")->first(['key' => $resource['key']]);

        if ($old) {
            return false;
        }

        $resource = $this->repository("resource")->insert($resource);

        if ($article) {

            $article['resource_id'] = $resource->id;

            $article = $this->repository("resource_article")->updateOrCreate([
                'resource_id' => $resource->id
            ], $article);
        }

        if ($audio) {
            $audio['resource_id'] = $resource->id;
            $audio                = $this->repository("resource_audio")->updateOrCreate([
                'resource_id' => $resource->id
            ], $audio);
        }

        if ($extension) {
            $extension['resource_id'] = $resource->id;
            $extension                = $this->repository("resource_extension")->updateOrCreate([
                'resource_id' => $resource->id
            ], $extension);
        }


    }

}