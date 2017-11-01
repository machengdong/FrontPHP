<?php
/**
 * FrontPHP  [文件描述]
 *
 * @category PHP
 *
 * @version  Release: 1.0.0
 *
 * @author   lru <lru@ximahe.cn>
 *
 */
namespace app\control\site;

use Front\Mvc\Control;
use Front\App;


class Home extends Control
{
    public function root()
    {
        return $this->display('site/home.php');
    }

    public function getInfo()
    {
        return $this->display('site/info.php');
    }
    public function getDesc()
    {
        return $this->display('site/desc.php');
    }

    public function getMdebug()
    {

        //\Front\Response::sendfile("./404.html");die;
        $object = App::model(\app\model\Home::class);

        $result = \Front\Db::instance()->table('sysinfo')->get();

        dump($result);

        dump(['1',[2],5],true);
        $datay = [];
        foreach ($result as $k=>$v)
        {
            $datay[] = date('y-m-d H:i:s',$v['date']);
        }
        $legend = ['usememp','usecpup','gd_usep','dd_usep'];
        $data = [];
        $datay = [];
        foreach ($legend as $v)
        {
            $row = [];
            $row['name'] = $v;
            $row['type'] = 'line';
            $row['stack'] = '总量';
            foreach ($result as $rows)
            {
                $row['data'][] = $rows[$v];
            }
            $data[] = $row;

        }
        return $data;






        var_dump($result);die;

        $object = new \Front\Driver\cache\File;
        $object->set('zaq',1234567);

        var_dump($object->get('zaq'));
        die;

        $object = App::model(\app\model\Home::class);
        echo "<pre>";
        $result = $object->table('demo')->getRow('*',['id'=>[1,2,3],'__sql__'=>"(start_status = 'Y' or login_status = 'N')"]);
        //var_dump($result);
        echo "<hr>";
        $result = \Front\Db::instance()
                    ->table('demo')
                    ->where(['id'=>[1,2,3],'__sql__'=>"(start_status = 'Y' or login_status = 'N')"])
                    ->limit(100,1)
                    ->get();
        //var_dump($result);
        echo "<hr>";
    }


}