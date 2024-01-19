<?php
namespace app\commands;

use Yii;
use yii\base\BaseObject;
use yii\queue\JobInterface;

class FileDownloadCommand extends BaseObject implements JobInterface
{
    public $uploadedFile;
    public $filePath;
    public function execute($queue)
    {
        $this->uploadedFile->tempName = $this->filePath . $this->uploadedFile->tempName;
        $this->filePath = Yii::getAlias('@webroot') . '/uploads/'
            . $this->uploadedFile->baseName
            . '_'
            . time() . '.' . $this->uploadedFile->extension;
        copy($this->uploadedFile->tempName, $this->filePath);
    }
}