<?php
namespace Package\R3m\Io\Apache2\Trait;

use R3m\Io\Config;


use R3m\Io\Module\Dir;
use R3m\Io\Module\Core;
use R3m\Io\Module\File;
use R3m\Io\Module\Sort;

use R3m\Io\Node\Model\Node;

use Exception;

use R3m\Io\Exception\DirectoryCreateException;
trait Configure {

    /**
     * @throws DirectoryCreateException
     * @throws Exception
     */
    public function apache2(): void
    {
        $object = $this->object();
        if($object->config(Config::POSIX_ID) !== 0){
            return;
        }
        //php and apache2 should be installed by docker.
        //if there is a different sury package, there are multiple versions

        $dir = new Dir();
        $read = $dir->read('/etc/php/');

        $read = Sort::list($read)->with(['name' => 'desc']);

        $file_old = false;
        if(count($read) === 1){
            $file = current($read);
        } else {
            $file = current($read);
            $file_old = end($read);
        }
        $fpm = 'php' . $file->name . '-fpm';
        if($file_old){
            $php = 'php' . $file_old->name;
        } else {
            $php = 'php' . $file->name;
        }
        Dir::create('/run/php');
        $command = 'a2enmod proxy_fcgi setenvif';
        exec($command);
        $command = 'a2enconf ' . escapeshellarg($fpm);
        exec($command);
        $command = 'a2dismod ' . escapeshellarg($php);
        exec($command);
        $command = 'a2dismod mpm_prefork';
        exec($command);
        $command = 'a2enmod mpm_event';
        exec($command);
        $command = 'a2enmod http2';
        exec($command);
        $command = 'a2enmod rewrite';
        exec($command);
        $command = 'a2enmod ssl';
        exec($command);
        $command = 'a2enmod md';
        exec($command);
        $command = '. /etc/apache2/envvars';
        exec($command);
    }
}