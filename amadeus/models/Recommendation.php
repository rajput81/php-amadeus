<?php

namespace Amadeus\models;

use common\models\Price;
use DateTime;
use SebastianBergmann\Money\Money;

class Recommendation
{
    /**
     * @var int
     */
    private $_blankCount;

    /**
     * @var Price
     */
    protected $_price;

    /**
     * Flight segments
     * @var FlightSegmentCollection
     */
    protected $_segments;

    /**
     * Validating carrier IATA
     * @var string
     */
    private $_validatingCarrierIata;

    /**
     * Marketing carrier IATAs
     * @var string[]
     */
    private $_suggestedMarketingCarrierIatas;

    /**
     * Some additional info
     * @var string
     */
    private $_additionalInfo = '';

    private $_cabins;
    private $_bookingClasses;
    private $_availabilities;

    /**
     * @var DateTime|null
     */
    private $_lastTktDate;
    private $_fareBasis;

    /**
     * Published fare?
     * @var boolean
     */
    private $_isPublishedFare;

    /**
     * Create ticket price
     * @param int $blankCount
     * @param Price $price
     * @param FlightSegmentCollection $segments
     * @param string $validatingCarrierIata
     * @param string $suggestedMarketingCarrierIatas
     * @param string $additionalInfo
     * @param $cabins
     * @param $bookingClasses
     * @param $availabilities
     * @param DateTime|null $lastTktDate
     * @param $fareBasis
     * @param boolean $isPublishedFare
     */
    function __construct($blankCount, $price, FlightSegmentCollection $segments, $validatingCarrierIata, $suggestedMarketingCarrierIatas, $additionalInfo, $cabins, $bookingClasses, $availabilities, $lastTktDate, $fareBasis, $isPublishedFare)
    {
        $this->_blankCount = $blankCount;
        $this->_price = $price;
        $this->_segments = $segments;
        $this->_validatingCarrierIata = $validatingCarrierIata;
        $this->_suggestedMarketingCarrierIatas = $suggestedMarketingCarrierIatas;
        $this->_additionalInfo = $additionalInfo;
        $this->_cabins = $cabins;
        $this->_bookingClasses = $bookingClasses;
        $this->_availabilities = $availabilities;
        $this->_lastTktDate = $lastTktDate;
        $this->_fareBasis = $fareBasis;
        $this->_isPublishedFare = $isPublishedFare;
    }

    /**
     * @return int
     */
    public function getBlankCount()
    {
        return $this->_blankCount;
    }

    /**
     * @return Price
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @return FlightSegmentCollection
     */
    public function getSegments()
    {
        return $this->_segments;
    }

    /**
     * @return string
     */
    public function getValidatingCarrierIata()
    {
        return $this->_validatingCarrierIata;
    }

    /**
     * @return \string[]
     */
    public function getSuggestedMarketingCarrierIatas()
    {
        return $this->_suggestedMarketingCarrierIatas;
    }

    /**
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->_additionalInfo;
    }

    /**
     * @return mixed
     */
    public function getCabins()
    {
        return $this->_cabins;
    }

    /**
     * @return string[]
     */
    public function getBookingClasses()
    {
        return $this->_bookingClasses;
    }

    /**
     * @return mixed
     */
    public function getAvailabilities()
    {
        return $this->_availabilities;
    }

    /**
     * @return DateTime|null
     */
    public function getLastTktDate()
    {
        return $this->_lastTktDate;
    }

    /**
     * @return mixed
     */
    public function getFareBasis()
    {
        return $this->_fareBasis;
    }

    /**
     * @return boolean
     */
    public function isPublishedFare()
    {
        return $this->_isPublishedFare;
    }

    /**
     * Return provider name
     * @return string
     */
    public function getSource()
    {
        return 'amadeus';
    }

    /**
     * Departure IATA
     * @return string
     */
    public function getDepartureIata()
    {
        return $this->getSegments()->getFirstSegment()->getDepartureIata();
    }

    /**
     * Arrival IATA
     * @return string
     */
    public function getArrivalIata()
    {
        return $this->getSegments()->getLastSegment()->getArrivalIata();
    }

    /**
     * @param Price $price
     */
    public function setPrice($price)
    {
        $this->_price = $price;
    }
}