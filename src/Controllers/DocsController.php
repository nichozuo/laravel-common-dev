<?php

namespace Nichozuo\LaravelCommonDev\Controllers;

use Doctrine\DBAL\Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Nichozuo\LaravelCommonDev\Helpers\DbalHelper;
use Nichozuo\LaravelCommonDev\Helpers\DocsHelper;

class DocsController extends BaseController
{
    /**
     * HomeController constructor.
     * @throws Exception
     */
    public function __construct()
    {
        DbalHelper::register();
    }

    /**
     * @title 获取Api文档的菜单
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function getMenu(Request $request): array
    {
        $params = $request->validate([
            'type' => 'required|string',
        ]);
        return match ($params['type']) {
            'readme' => DocsHelper::GetReadmeMenu(),
            'modules' => DocsHelper::GetModulesMenu(app_path('Modules' . DIRECTORY_SEPARATOR)),
            'database' => DocsHelper::GetDatabaseMenu(),
            default => [],
        };
    }

    /**
     * @intro 获取md的内容
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function getContent(Request $request): array
    {
        $params = $request->validate([
            'type' => 'required|string',
            'key' => 'required|string',
        ]);
        return match ($params['type']) {
            'readme' => DocsHelper::GetReadmeContent($params['key']),
            'modules' => DocsHelper::GetModulesContent($params['key']),
            'database' => DocsHelper::GetDatabaseContent($params['key']),
            default => [],
        };
    }
}