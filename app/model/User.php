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
namespace app\model;

use Front\Mvc\Model;

class User extends Model
{
    private $userLoginInfoItem = ['user_id'=>'admin_user_id','username'=>'admin_user_username'];

    public function login(array $input,&$msg=null)
    {
        $username = $input['username'];
        $password = $input['password'];
        if(!$username || !$password)
        {
            $msg = '帐户名或密码为空。';
            return false;
        }
        $userInfo = $this->getRow('*',['account'=>$username]);
        if(!$userInfo || !$userInfo['password'])
        {
            $msg = '帐户不存在。';
            return false;
        }
        if(md5($username.$password.$userInfo['savetime']) !== $userInfo['password'])
        {
            $msg = '密码不正确。';
            return false;
        }
        if($userInfo['start_status'] == 'N')
        {
            $msg = '帐户没启用。';
            return false;
        }
        $this->setLoginInfo($userInfo);
        return true;
    }

    public function logout()
    {
        foreach ($this->userLoginInfoItem as $k=>$v)
        {
            \Front\Session::set($v,'');
        }
        return true;
    }

    public function setLoginInfo(array $userInfo)
    {
        foreach ($this->userLoginInfoItem as $k=>$v)
        {
            \Front\Session::set($v,$userInfo[$k]);
        }
        return true;
    }

    public function getLoginInfo(&$userInfo = [])
    {
        foreach ($this->userLoginInfoItem as $k=>$v)
        {
            $userInfo[$v] = \Front\Session::get($v);
        }
        return true;
    }

    public function isLogin(&$userInfo = [])
    {
        $this->getLoginInfo($userInfo);

        foreach ($this->userLoginInfoItem as $k=>$v)
        {
            if(!$userInfo[$v])
            {
                return false;
            }
        }
        return true;
    }
}