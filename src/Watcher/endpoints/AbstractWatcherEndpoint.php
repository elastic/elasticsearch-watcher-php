<?php

namespace Watcher\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractWatcherEndpoint
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

abstract class AbstractWatcherEndpoint extends AbstractEndpoint {

    protected $id;

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        if (isset($id) !== true) {
            return $this;
        }

        $this->id = $id;
        return $this;
    }
}