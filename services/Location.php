<?php

namespace Services;

class Location
{
    private $country;
    private $region;
    private $city;

    public function __construct(
        string  $country,
        ?string $region = null,
        ?string $city = null
    )
    {
        $this->country = $country;
        $this->region = $region;
        $this->city = $city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }


}