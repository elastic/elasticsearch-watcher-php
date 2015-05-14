<?php

namespace Watcher;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class SnapshotNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\SnapshotNamespace
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class WatcherNamespace extends AbstractNamespace
{

    /**
     * @return callable
     */
    public static function build() {
        return function ($dicParams) {
            return new WatcherNamespace($dicParams['transport'], $dicParams['endpoint']);
        };
    }

    /**
     * $params['id']             = (string) Watch ID (Required)
     *        ['master_timeout'] = (numeric)Specify timeout for watch write operation
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function ackWatch($params)
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new Endpoints\AckWatch($this->transport);
        $endpoint->setId($id)->setParams($params);

        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['id']             = (string) Watch ID (Required)
     *        ['master_timeout'] = (numeric)Specify timeout for watch write operation
     *        ['force']          = (bool) Specify if this request should be forced and ignore locks
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function deleteWatch($params)
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new Endpoints\DeleteWatch($this->transport);
        $endpoint->setId($id)->setParams($params);

        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['id'] = (string) Watch ID (Required)
     * $params['body' = (hash) Execution control
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function executeWatch($params)
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new Endpoints\ExecuteWatch($this->transport);
        $endpoint->setId($id)->setbody($body)->setParams($params);

        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['id'] = (string) Watch ID (Required)
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function getWatch($params)
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new Endpoints\GetWatch($this->transport);
        $endpoint->setId($id)->setParams($params);

        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function info($params)
    {
        $endpoint = new Endpoints\Info($this->transport);
        $endpoint->setParams($params);

        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['id']             = (string) Watch ID (Required)
     *        ['body']           = (hash) The watch
     *        ['master_timeout'] = (numeric)Specify timeout for watch write operation
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function putWatch($params)
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new Endpoints\PutWatch($this->transport);
        $endpoint->setId($id)->setbody($body)->setParams($params);

        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function restart($params)
    {
        $endpoint = new Endpoints\Restart($this->transport);
        $endpoint->setParams($params);

        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function start($params)
    {
        $endpoint = new Endpoints\Start($this->transport);
        $endpoint->setParams($params);

        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function stats($params)
    {
        $endpoint = new Endpoints\Stats($this->transport);
        $endpoint->setParams($params);

        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function stop($params)
    {
        $endpoint = new Endpoints\Stop($this->transport);
        $endpoint->setParams($params);

        $response = $endpoint->performRequest();
        return $response['data'];
    }
}