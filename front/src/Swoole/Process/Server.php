<?php

class Server
{
    public $worker = 3;

    public $pids   = [];

    public function start()
    {
        swoole_timer_tick(1000, [$this, 'examine']);

        //swoole_process::daemon(true);

        swoole_process::signal(SIGCHLD, function($sig) {
            //必须为false，非阻塞模式
            while($ret =  swoole_process::wait(false)) {
                unset($this->pids[$ret['pid']]);
            }
        });

        $this->setMasterPid();
    }

    public function stop()
    {
        //停止主线程
        swoole_process::kill($this->getMasterPid(),SIGTERM);
        //停止子进程
        array_walk($this->getWorkerPid(),function($v,$k){
           swoole_process::kill($v,SIGTERM);
        });
        //todo
    }

    public function examine(){
        //echo '进程数：'.count($this->pids).PHP_EOL;
        $pidTie = count($this->pids);
        while($pidTie < $this->worker) {
            //$process = new swoole_process([$this,'run']);
            $process = new swoole_process(function (swoole_process $worker){//测试闭包
                while(1) {
                    echo "123\n";
                    sleep(5);
                }
            });
            //echo 'php Server.php '.count($this->pids).' worker process'.PHP_EOL;
            $process->name('php Server.php worker process');
            $pid = $process->start();
            $this->pids[$pid] = $pid;
            $this->getWorkerPid($pid);
        }
        /** 不知道是我姿势不对，还是BUG,主进程名总是被修改！ */
        swoole_set_process_name('php Server.php master');
    }

    /**
     * 子进程回调方法
     *
     * @param swoole_process $worker
     */
    public function run(swoole_process $worker)
    {
        sleep(10);
        $worker->exit(0);
    }

    /**
     * 设置主线程PID
     *
     * @return int
     */
    public function setMasterPid()
    {
        //s.1 获取pid
        $pid = posix_getpid();
        //s.2 写入一个文件
        file_put_contents('./swoole-master.pid',$pid);
        return $pid;
    }

    /**
     * 获取主线程PID
     *
     * @return bool|string
     */
    public function getMasterPid()
    {
        $pid = file_get_contents('./swoole-master.pid');
        return $pid;
    }

    /**
     * 记录工作线程PID
     *
     * @param $pid
     */
    public function setWorkerPid($pid)
    {
        //TODO
    }

    /**
     * 获取工作线程PID
     *
     * @return array
     */
    public function getWorkerPid()
    {
        //TODO
        return [];
    }

}
