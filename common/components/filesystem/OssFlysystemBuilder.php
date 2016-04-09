<?php
namespace common\components\filesystem;

use Yii;
use League\Flysystem\Filesystem;
use trntv\filekit\filesystem\FilesystemBuilderInterface;
use OSS\OssClient;
use OSS\Core\OssException;

/**
 * Class LocalFlysystemProvider
 * @author Eugene Terentev <eugene@terentev.net>
 */
class OssFlysystemBuilder implements FilesystemBuilderInterface
{
    public $oss_client_id;
    public $oss_client_secret;
    public $bucket_name;
    public $endpoint;

    public function build()
    {
        $adapter = null;
        try {
            $ossClient = new OssClient(
                $this->oss_client_id,
                $this->oss_client_secret,
                $this->endpoint,
                true
            );
            $adapter = new OssAdapter($ossClient, $this->bucket_name);

        } catch (OssException $e) {
            print $e->getMessage();
            Yii::error($e);
        }
        return new Filesystem($adapter);
    }
}