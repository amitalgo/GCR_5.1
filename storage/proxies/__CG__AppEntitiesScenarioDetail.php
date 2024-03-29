<?php

namespace DoctrineProxies\__CG__\App\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ScenarioDetail extends \App\Entities\ScenarioDetail implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'id', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'titleId', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'name', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'description', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'priority', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'status', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'addNo', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'addDate', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'updNo', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'updDate', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'urlSlug', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'scenarioDetailSlug', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'scenarioProductId', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'scenarioTagId', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'image'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'id', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'titleId', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'name', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'description', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'priority', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'status', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'addNo', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'addDate', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'updNo', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'updDate', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'urlSlug', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'scenarioDetailSlug', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'scenarioProductId', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'scenarioTagId', '' . "\0" . 'App\\Entities\\ScenarioDetail' . "\0" . 'image'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ScenarioDetail $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', [$id]);

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getTitleId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitleId', []);

        return parent::getTitleId();
    }

    /**
     * {@inheritDoc}
     */
    public function setTitleId($titleId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitleId', [$titleId]);

        return parent::setTitleId($titleId);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getPriority()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPriority', []);

        return parent::getPriority();
    }

    /**
     * {@inheritDoc}
     */
    public function setPriority($priority)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPriority', [$priority]);

        return parent::setPriority($priority);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', []);

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', [$status]);

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddNo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddNo', []);

        return parent::getAddNo();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddNo($addNo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddNo', [$addNo]);

        return parent::setAddNo($addNo);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddDate', []);

        return parent::getAddDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddDate($addDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddDate', [$addDate]);

        return parent::setAddDate($addDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdNo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdNo', []);

        return parent::getUpdNo();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdNo($updNo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdNo', [$updNo]);

        return parent::setUpdNo($updNo);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdDate', []);

        return parent::getUpdDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdDate($updDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdDate', [$updDate]);

        return parent::setUpdDate($updDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrlSlug()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrlSlug', []);

        return parent::getUrlSlug();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrlSlug($urlSlug)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrlSlug', [$urlSlug]);

        return parent::setUrlSlug($urlSlug);
    }

    /**
     * {@inheritDoc}
     */
    public function getScenarioProductId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getScenarioProductId', []);

        return parent::getScenarioProductId();
    }

    /**
     * {@inheritDoc}
     */
    public function setScenarioProductId($scenarioProductId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setScenarioProductId', [$scenarioProductId]);

        return parent::setScenarioProductId($scenarioProductId);
    }

    /**
     * {@inheritDoc}
     */
    public function getScenarioTagId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getScenarioTagId', []);

        return parent::getScenarioTagId();
    }

    /**
     * {@inheritDoc}
     */
    public function setScenarioTagId($scenarioTagId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setScenarioTagId', [$scenarioTagId]);

        return parent::setScenarioTagId($scenarioTagId);
    }

    /**
     * {@inheritDoc}
     */
    public function addScenarioTags(\App\Entities\TagCategory $tagCategory)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addScenarioTags', [$tagCategory]);

        return parent::addScenarioTags($tagCategory);
    }

    /**
     * {@inheritDoc}
     */
    public function getSelectedTagsByCategory()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSelectedTagsByCategory', []);

        return parent::getSelectedTagsByCategory();
    }

    /**
     * {@inheritDoc}
     */
    public function setImage($image)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImage', [$image]);

        return parent::setImage($image);
    }

    /**
     * {@inheritDoc}
     */
    public function getImage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImage', []);

        return parent::getImage();
    }

    /**
     * {@inheritDoc}
     */
    public function getScenarioImg()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getScenarioImg', []);

        return parent::getScenarioImg();
    }

    /**
     * {@inheritDoc}
     */
    public function getScenarioDetailSlug()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getScenarioDetailSlug', []);

        return parent::getScenarioDetailSlug();
    }

    /**
     * {@inheritDoc}
     */
    public function setScenarioDetailSlug($scenarioDetailSlug)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setScenarioDetailSlug', [$scenarioDetailSlug]);

        return parent::setScenarioDetailSlug($scenarioDetailSlug);
    }

}
