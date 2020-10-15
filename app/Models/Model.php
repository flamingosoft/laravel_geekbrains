<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class Model {
    protected $data = null;

    protected  function repo()
    {
        return Storage::disk($this::getDriver());
    }

    public  function getDriver(): string
    {
        return 'local';
    }

    protected  function getContainerName(): string {
    }

    protected  function initData(): void
    {
        try {
            if ($this::repo()->exists($this::getContainerName())) {
                $this::setData(json_decode($this::repo()->get($this::getContainerName()), true));
                return;
            }
        } catch (FileNotFoundException $e) {
        }
        $this->setDefault();
        $this->save();

    }

    protected  function setDefault(): void {

    }

    public  function setData(array $Data)
    {
        $this->data = $Data;
        $this->save();
    }

    public  function save(): void
    {
        Storage::disk($this::getDriver())->put(
            $this::getContainerName(),
            json_encode($this::getData(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );
    }

    protected  function getData(): array
    {
        if (is_null($this->data))
            $this->initData();
        return $this->data;
    }

}
