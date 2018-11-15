<?php

namespace App\Console\Commands\Wechart;

use Illuminate\Console\Command;
use App\Traits\CommonTrait;


class Article extends Command
{
    use CommonTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'z:a';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        $this->sqlLogStart();

        $feed = $this->service('feed')->getList(['type' => 'wechart', 'level' => 2]);

        if (!count($feed)) {
            return null;
        }

        foreach ($feed as $item) {
            //$this->fetchList($item, '');
            $this->fetchDesc($item);
        }

//        $this->sqlLogEnd();
    }

    // 获取文章详情
    public function fetchDesc($feed)
    {

        $resourse = $this->repository('resource')->findWhere([
            'feed_id' => $feed->id,
            'state'   => 'pending',
        ]);
        if (!@count($resourse)) {
            return false;
        }

        foreach ($resourse as $item) {

            $url = str_replace('?', '?f=json&', $item->content_url);
            $url = str_replace('http://', 'https://', $url);

            // 获取json
            $json = $this->curlByUrl($url);

            // 解析字段到新的表

            $resource = [
                'state'        => 'publish',
            ];

            $article = [
                'content' => $json['content_noencode'] ?? null, // 摘要

            ];

            $this->repository('resource')->update($item->id, $resource);
            $this->repository('resource_article')->update($item->id, $article);


            // 修改状态

        }

    }

    // 获取文章列表
    public function fetchList($feed, $session)
    {
        for ($i = 0; $i < 10000; $i += 10) {
            $rs = $this->curl($i, $feed->account, $feed->token);
            if (empty($rs['general_msg_list'])) {
                break;
            }

            $list = json_decode($rs['general_msg_list'], true);
            $list = $list['list'] ?? [];

            $data = [];

            foreach ($list as $v) {


                $resource = [
                    'title'        => $v['app_msg_ext_info']['title'] ?? null,
                    'type'         => 'article',
                    'state'        => 'pending',
                    'creator'      => $v['app_msg_ext_info']['author'] ?? null,
                    'count_view'   => 0,
                    'published_at' => date('Y-m-d H:i:s', @$v['comm_msg_info']['datetime']),
                    'feed_id'      => $feed->id,
                    'source_url'   => $v['app_msg_ext_info']['source_url'] ?? null,
                    'content_url'   => $v['app_msg_ext_info']['content_url'] ?? null,
                ];

                // 文章唯一key
                $resource['key'] = sha1($resource['title'] . $feed->id);

                $article = [
                    'digest' => $v['app_msg_ext_info']['digest'] ?? null, // 摘要

                ];

                $extension = [
                    'cover' => $v['app_msg_ext_info']['cover'] ?? null, // 摘要
                ];

                $this->service('resource')->store($resource, $article, [], $extension);

            }


        }

    }

    public function curl($offset, $biz, $key)
    {
        $curl = "curl  'https://mp.weixin.qq.com/mp/profile_ext?action=getmsg&__biz={$biz}&f=json&offset={$offset}&count=10&is_ok=1&scene=124&uin=MTY5Njc2ODM2Mg%3D%3D&key={$key}&pass_ticket=XpqWzUMIhC%2FkHjSE9VW9rieFOt0%2BtD3K5A6Y5FiJU%2Bxk17EoRxa%2BZ4CZU1Sfl%2FTV&wxtoken=&appmsg_token=982_1X%252BldWG3Xb%252F7HThyDgzKiBPPIseouiaQ4lN_rQ~~&x5=0&f=json'";

        $json = shell_exec($curl);

        var_export($json);

        return $json ? json_decode($json, true) : [];
    }

    public function curlByUrl($url)
    {
        $curl = "curl  \"{$url}\"";

        var_export($url);

        $json = shell_exec($curl);

        var_export($json);

        return $json ? json_decode($json, true) : [];
    }

}
