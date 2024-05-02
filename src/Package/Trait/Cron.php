<?php
namespace Package\R3m\Io\Basic\Trait;

use R3m\Io\Config;

use R3m\Io\Module\Core;
use R3m\Io\Module\Dir;
use R3m\Io\Module\File;

use Exception;

use R3m\Io\Exception\DirectoryCreateException;
use R3m\Io\Exception\FileWriteException;

trait Cron {

    /**
     * @throws DirectoryCreateException
     * @throws FileWriteException
     * @throws Exception
     */
    public function backup($flags, $options): void
    {
        $object = $this->object();
        $url = '/etc/cron.d/r3m_io';
        $environment = $object->config('framework.environment');
        if(File::exist($url)){
            $target = $object->config('project.dir.data') .
                'Cron' .
                $object->config('ds') .
                'Cron' .
                '.' .
                $environment
            ;
            File::write($target, File::read($url));
        } else {
            //create cron file for each environment.
            $environments = [
                'development',
                'test',
                'staging',
                'replica',
                'production'
            ];

            $dir = $object->config('project.dir.data') .
                'Cron' .
                $object->config('ds')
            ;
            $source = $object->config('project.dir.package') .
                'R3m' .
                $object->config('ds') .
                'Io' .
                $object->config('ds') .
                'Basic' .
                $object->config('ds') .
                'Data' .
                $object->config('ds') .
                'Cron'
            ;
            foreach($environments as $record){
                $url = $dir . 'Cron' . '.' . $record;
                if(!File::exist($url)){
                    Dir::create($dir, Dir::CHMOD);
                    File::write($url, File::read($source));
                    if($environment === Config::MODE_DEVELOPMENT){
                        File::permission($object, [
                            'url' => $url,
                            'dir' => $dir
                        ]);
                    }
                }
            }
        }
    }

    /**
     * @throws FileWriteException
     */
    public function restore($flags, $options): void
    {
        $object = $this->object();
        $url = '/etc/cron.d/r3m_io';
        $environment = $object->config('framework.environment');
        $source = $object->config('project.dir.data') .
            'Cron' .
            $object->config('ds') .
            'Cron' .
            '.' .
            $environment
        ;
        if(File::exist($source)){
            File::write($url, File::read($source));
        }
    }

    public function restart($flags, $options): void
    {
        $command = 'service cron restart';
        $object = $this->object();
        Core::execute($object, $command, $output, $notification);
        if($output){
            echo $output;
        }
        if($notification){
            echo $notification;
        }
    }

    public function start($flags, $options): void
    {
        $command = 'service cron start';
        $object = $this->object();
        Core::execute($object, $command, $output, $notification);
        if($output){
            echo $output;
        }
        if($notification){
            echo $notification;
        }
    }

    public function stop($flags, $options): void
    {
        $command = 'service cron stop';
        $object = $this->object();
        Core::execute($object, $command, $output, $notification);
        if($output){
            echo $output;
        }
        if($notification){
            echo $notification;
        }
    }
}