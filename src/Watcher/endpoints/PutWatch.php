<?php


namespace Watcher\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class PutWatch
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class PutWatch extends AbstractWatcherEndpoint
{

    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            throw new Exceptions\RuntimeException(
                'body is required for PutWatch'
            );
        }

        $this->body = $body;
        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for PutWatch'
            );
        }

        $id = $this->id;

        return "/_watcher/watch/$id";
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'master_timeout'
        );
    }


    /**
     * @return string
     */
    protected function getMethod()
    {
        return "PUT";
    }
}