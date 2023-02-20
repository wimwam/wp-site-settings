<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Organization
 * @package Duracom\JsonLd\Schemas
 */
class Organization implements SchemaInterface
{
    /**
     * @var string
     */
    protected $type = 'Organization';

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|ImageObject
     */
    protected $logo;

    /**
     * @var string|null
     */
    protected $image;

    /**
     * @var Address
     */
    protected $address;

    /**
     * @var string|null
     */
    protected $priceRange;

    /**
     * @var string
     */
    protected $telephone;

    /**
     * @var array
     */
    protected $sameAs = [];

    /**
     * @var Schema
     */
    protected $subSchema;


    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Organization
     */
    public function setType(string $type): Organization
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Organization
     */
    public function setUrl(string $url): Organization
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Organization
     */
    public function setName(string $name): Organization
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|ImageObject
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string|ImageObject $logo
     * @return Organization
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return Organization
     */
    public function setImage(?string $image): Organization
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Organization
     */
    public function setAddress(Address $address): Organization
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPriceRange(): ?string
    {
        return $this->priceRange;
    }

    /**
     * @param string|null $priceRange
     * @return Organization
     */
    public function setPriceRange(?string $priceRange): Organization
    {
        $this->priceRange = $priceRange;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     * @return Organization
     */
    public function setTelephone(string $telephone): Organization
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return array
     */
    public function getSameAs(): array
    {
        return $this->sameAs;
    }

    /**
     * @param array $sameAs
     * @return Organization
     */
    public function setSameAs(array $sameAs): Organization
    {
        $this->sameAs = $sameAs;
        return $this;
    }

    /**
     * @return SchemaInterface[]|null
     */
    public function getSubSchema(): ?array
    {
        return $this->subSchema;
    }

    /**
     * @param SchemaInterface|null $appendableObjects
     * @return SchemaInterface
     */
    public function setSubSchema(?SchemaInterface $appendableObjects): SchemaInterface
    {
        $this->subSchema[] = $appendableObjects;
        return $this;
    }

    /**
     * @return array
     */
    public function asArray(): array
    {
        $jsonLdObject = [
            '@type' => $this->getType(),
            'name' => $this->getName(),
            'url' => $this->getUrl(),
            'address' => $this->getAddress()->asArray(),
            'telephone' => $this->getTelephone()
        ];
        if ($this->getImage()) {
            $jsonLdObject['image'] = $this->getImage();
        }
        if ($this->getPriceRange()) {
            $jsonLdObject['priceRange'] = $this->getPriceRange();
        }
        if ($this->getLogo() instanceof ImageObject) {
            $jsonLdObject['logo'] = $this->getLogo()->asArray();
        } else {
            $jsonLdObject['logo'] = $this->getLogo();
        }

        if (is_array($this->getSameAs())) {
            foreach ($this->getSameAs() as $key => $value) {
                $jsonLdObject['sameAs'][] = $value;
            }
        }

        if ($this->getSubSchema()) {
            foreach ($this->getSubSchema() as $object) {
                if(!empty($object->getName())){
                    $jsonLdObject[$object->getName()][] = $object->getSubSchema()->asArray();
                } else {
                    $jsonLdObject = array_merge($jsonLdObject, $object->asArray());
                }
            }
        }

        return $jsonLdObject;
    }
}
