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
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enconf ' . escapeshellarg($fpm);
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2dismod ' . escapeshellarg($php);
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2dismod mpm_prefork';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enmod mpm_event';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enmod http2';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enmod rewrite';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enmod ssl';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = 'a2enmod md';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
        $command = '. /etc/apache2/envvars';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
    }

    /**
     * @throws Exception
     */
    public function apache2_restore(): void
    {
        $object = $this->object();
        if($object->config(Config::POSIX_ID) !== 0){
            return;
        }
        $url = $object->config('project.dir.data') . 'Apache2' . $object->config('ds');
        $dir = new Dir();
        $read = $dir->read($url);
        if(!is_array($read)){
            return;
        }
        foreach($read as $file){
            if($file->type === File::TYPE){
                $source = $file->url;
                $destination = '/etc/apache2/sites-available/' . $file->name;
                if(File::exist($destination)) {
                    File::delete($destination);
                }
                File::copy($source, $destination);
                exec('chmod 640 ' . $destination);
                exec('chown root:root ' . $destination);
                $disabled = $object->config('server.site.disabled');
                if(in_array($file->name, $disabled, true)){
                    $command = 'a2dissite ' . $file->name;
                    Core::execute($object, $command, $output, $notification);
                    if(!empty($output)){
                        echo $output . PHP_EOL;
                    }
                    if(!empty($notification)){
                        echo $notification . PHP_EOL;
                    }
                } else {
                    $command = 'a2ensite ' . $file->name;
                    Core::execute($object, $command, $output, $notification);
                    if(!empty($output)){
                        echo $output . PHP_EOL;
                    }
                    if(!empty($notification)){
                        echo $notification . PHP_EOL;
                    }
                }
            }
        }
    }

    /**
     * @throws Exception
     */
    public function apache2_backup(): void
    {
        $object = $this->object();
        if($object->config(Config::POSIX_ID) !== 0){
            return;
        }
        $destination_dir = $object->config('project.dir.data') . 'Apache2' . $object->config('ds');
        $url = '/etc/apache2/sites-available/';
        $dir = new Dir();
        $read = $dir->read($url);
        Dir::create($destination_dir, Dir::CHMOD);
        foreach($read as $file){
            if($file->type === File::TYPE){
                $source = $file->url;
                $destination = $destination_dir . $file->name;
                if(File::exist($destination)) {
                    File::delete($destination);
                }
                File::copy($source, $destination);
                File::permission($object, [
                    'destination_dir' => $destination_dir,
                    'destination' => $destination
                ]);
            }
        }
    }

    /**
     * @throws Exception
     */
    public function apache2_restart(): void
    {
        $object = $this->object();
        if($object->config(Config::POSIX_ID) !== 0){
            return;
        }
        $command = 'service apache2 restart';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
    }

    /**
     * @throws Exception
     */
    public static function php_restart(App $object, $event, $options=[]): void
    {
        if($object->config(Config::POSIX_ID) !== 0){
            return;
        }
        //php and apache2 should be installed by docker.
        //if there is a different sury package, there are multiple versions
        $dir = new Dir();
        $read = $dir->read('/etc/php/');
        $read = Sort::list($read)->with(['name' => 'desc']);
        $file = current($read);
        $fpm = 'php' . $file->name . '-fpm';
        $command = 'service ' . $fpm . ' restart';
        Core::execute($object, $command, $output, $notification);
        if(!empty($output)){
            echo $output . PHP_EOL;
        }
        if(!empty($notification)){
            echo $notification . PHP_EOL;
        }
    }
}