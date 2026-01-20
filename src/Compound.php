<?php

/**
 * Part of the StethoMe package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    StethoMe
 * @version    1.0.0
 * @author     Homedoctor
 * @license    BSD License (3-clause)
 * @copyright  (c) 2020, Homedoctor
 */

namespace Jlorente\StethoMe;

use Jlorente\StethoMe\Core\Api as CoreApi;

/**
 * Class Api.
 * 
 * @author Jose Lorente <jose.lorente.martin@gmail.com>
 */
class Compound extends CoreApi
{

    /**
     * Returns the base uri fragment for this container.
     * 
     * @return string
     */
    public function baseUri()
    {
        return "compound";
    }

    /**
     * Delete visit recordings.
     * 
     * @param string $visitId
     * @return array
     */
    public function deleteVisit($visitId)
    {
        return $this->_delete("visit/$visitId");
    }

    /**
     * Check processing status of all recordings associated with given visit id.
     * 
     * @param string $visitId
     * @return array
     */
    public function getVisit($visitId)
    {
        return $this->_get("visit/$visitId/check");
    }

    /**
     * Check processing status of single recording associated with given visit id.
     *
     * @param string $visitId
     * @param int $point
     * @return array
     */
    public function getPoint($visitId, $point)
    {
        return $this->_get("visit/$visitId/recording/$point/check");
    }

    /**
     * Get analysed tags for a single recording from given visit id.
     *
     * @param string $visitId
     * @param int $point
     * @return array
     */
    public function getPointTags($visitId, $point)
    {
        return $this->_get("visit/$visitId/recording/$point/tags");
    }

    /**
     * Get single recording audio file for playback.
     *
     * @param string $visitId
     * @param int $point
     * @return array
     */
    public function getPointWav($visitId, $point)
    {
        return $this->_get("visit/$visitId/recording/$point/wav");
    }

    /**
     * Generate visit ID. All subsequent client requests will have to send this 
     * ID to properly match all recordings to same visit.
     *
     * @param string $pushId
     * @return array
     */
    public function getVisitId()
    {
        return $this->_get('visit');
    }

    /**
     * Add visit content.
     * 
     * @param string $visitId
     * @param array $params
     * @return array
     */
    public function postVisitContent($visitId, array $params = [])
    {
        return $this->_post("visit/$visitId", $params);
    }

    /**
     * Create visit copy token.
     * 
     * @param string $visitId
     * @return array
     */
    public function copyVisit($visitId)
    {
        return $this->_get("visit/$visitId/copy");
    }

    /**
     * Lock visit.
     * 
     * @param string $visitId
     * @return array
     */
    public function lockVisit($visitId)
    {
        return $this->_post("visit/$visitId/lock");
    }

}
