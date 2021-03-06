<?php

namespace Dcat\Admin\Actions;

use Dcat\Admin\Admin;
use Dcat\Admin\Traits\HasAuthorization;

trait HasActionHandler
{
    use HasAuthorization {
        failedAuthorization as parentFailedAuthorization;
    }

    /**
     * @var Response
     */
    protected $response;

    private $confirmString;

    private $paramString;

    /**
     * @return Response
     */
    public function response()
    {
        if (is_null($this->response)) {
            $this->response = new Response();
        }

        return $this->response;
    }

    /**
     * @return string
     */
    public function method()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    protected function parameters()
    {
        return [];
    }

    /**
     * Confirm message of action.
     *
     * @return string|void
     */
    public function confirm()
    {
    }

    /**
     * @return mixed
     */
    public function makeCalledClass()
    {
        return str_replace('\\', '_', get_called_class());
    }

    /**
     * @return string
     */
    public function handlerRoute()
    {
        return route(admin_api_route('action'));
    }

    /**
     * @return string
     */
    protected function normalizeConfirmData()
    {
        if ($this->confirmString !== null) {
            return $this->confirmString;
        }

        $confirm = $this->confirm();

        return $this->confirmString = ($confirm ? admin_javascript_json((array) $confirm) : 'false');
    }

    /**
     * @return string
     */
    protected function normalizeParameters()
    {
        return $this->paramString ?: ($this->paramString = json_encode($this->parameters()));
    }

    /**
     * @return void
     */
    protected function addHandlerScript()
    {
        $script = <<<JS
Dcat.Action({
    selector: '{$this->selector()}',
    event: '{$this->event}',
    method: '{$this->method()}',
    key: '{$this->getKey()}',
    url: '{$this->handlerRoute()}',
    data: {$this->normalizeParameters()},
    confirm: {$this->normalizeConfirmData()},
    calledClass: '{$this->makeCalledClass()}',
    before: {$this->actionScript()},
    html: {$this->handleHtmlResponse()},
    success: {$this->resolverScript()}, 
    error: {$this->rejectScript()},
});
JS;

        Admin::script($script);
        Admin::js('@admin/dcat/extra/action.js');
    }

    /**
     * ???????????????????????????????????????????????????false??????????????????.
     *
     * @return string
     */
    protected function actionScript()
    {
        // ?????????????????????????????????false??????????????????
        return <<<'JS'
function (data, target, action) { }
JS;
    }

    /**
     * ?????????????????????????????????false???????????????????????????????????????.
     *
     * @return string
     */
    protected function resolverScript()
    {
        // ???????????????????????????false???????????????????????????????????????
        return <<<'JS'
function (target, results) {}
JS;
    }

    /**
     * ?????????????????????HTML??????.
     *
     * @return string
     */
    protected function handleHtmlResponse()
    {
        return <<<'JS'
function (target, html, data) {
    target.html(html);
}
JS;
    }

    /**
     * ?????????????????????????????????false???????????????????????????????????????.
     *
     * @return string
     */
    protected function rejectScript()
    {
        return <<<'JS'
function (target, results) {}
JS;
    }

    /**
     * @return Response
     */
    public function failedAuthorization()
    {
        return $this->response()->error(__('admin.deny'));
    }
}
