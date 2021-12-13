<?php
namespace Dvomaks\LaravelOsrm;

use Dvomaks\LaravelOsrm\Transports\TransportInterface;

abstract class AbstractService
{
    protected ?string $coordinates;

    protected string $format = 'json';

    protected array $options = [];

    protected string $profile = 'driving'; // driving, car, bike, foot

    protected ?string $service; //route, nearest, table, match, trip, tile

    protected string $version = 'v1';

    public function __construct(TransportInterface $transport) {
        $this->transport = $transport;
    }

    protected ?TransportInterface $transport;

    /**
     * @param string $coordinates
     * @return Response
     * @throws \JsonException
     */
    public function fetch(string $coordinates): Response
    {
        $this->coordinates = $coordinates;

        $this->transport->request($this->getUri());

        return new Response($this->transport->getResponse());
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $uri = "$this->service/$this->version/$this->profile/$this->coordinates.$this->format";
        if ($this->options)
        {
            $uri .= "?" . http_build_query($this->options, null);
        }

        return $uri;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function setOption($key, $value): AbstractService
    {
        $this->options[$key] = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setProfile(string $value): AbstractService
    {
        $this->profile = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setVersion(string $value): AbstractService
    {
        $this->version = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setBearings(string $value): AbstractService
    {
        return $this->setOption('bearings', $value);
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setRadiuses(string $value): AbstractService
    {
        return $this->setOption('radiuses', $value);
    }

    /**
     * @param string $value
     * @return $this
     * @throws Exception
     */
    public function setGenerateHints(string $value): AbstractService
    {
        if (!in_array($value, array('true', 'false')))
        {
            throw new Exception('Invalid value for $generate_hints.');
        }

        return $this->setOption('generate_hints', $value);
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setHints(string $value): AbstractService
    {
        return $this->setOption('hints', $value);
    }

    /**
     * @param string $value
     * @return $this
     * @throws Exception
     */
    public function setApproaches(string $value): AbstractService
    {
        if (!preg_match('/^(?:curb|unrestricted)(?:;(?:curb|unrestricted))*$/', $value))
        {
            throw new Exception('Invalid value for $approaches.');
        }

        return $this->setOption('approaches', $value);
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setExclude(string $value): AbstractService
    {
        return $this->setOption('exclude', $value);
    }

    /**
     * @param string $value
     * @return $this
     * @throws Exception
     */
    protected function _setGeometries(string $value): AbstractService
    {
        if (!in_array($value, array('polyline', 'polyline6', 'geojson')))
        {
            throw new Exception('Invalid value for $geometries.');
        }

        return $this->setOption('geometries', $value);
    }

    /**
     * @param string $value
     * @return $this
     * @throws Exception
     */
    protected function _setSteps(string $value): AbstractService
    {
        if (!in_array($value, array('true', 'false')))
        {
            throw new Exception('Invalid value for $steps.');
        }

        return $this->setOption('steps', $value);
    }

    /**
     * @param string $value
     * @return $this
     * @throws Exception
     */
    protected function _setAnnotations(string $value): AbstractService
    {
        if (!in_array($value, array('true', 'false', 'nodes', 'distance', 'duration', 'datasources', 'weight', 'speed')))
        {
            throw new Exception('Invalid value for $annotations.');
        }

        return $this->setOption('annotations', $value);
    }

    /**
     * @param string $value
     * @return $this
     * @throws Exception
     */
    protected function _setOverview(string $value): AbstractService
    {
        if (!in_array($value, array('simplified', 'full', 'false')))
        {
            throw new Exception('Invalid value for $overview.');
        }

        return $this->setOption('overview', $value);
    }

    /**
     * @param string $value
     * @return $this
     * @throws Exception
     */
    protected function _setWaypoints(string $value): AbstractService
    {
        if (!preg_match('/^\d+(?:(?:;\d+)?)+$/', $value))
        {
            throw new Exception('Invalid value for $waypoints.');
        }

        return $this->setOption('waypoints', $value);
    }
}
