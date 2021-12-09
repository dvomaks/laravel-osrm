<?php

namespace Dvomaks\LaravelOsrm;

class Transport
{
    protected int $connectTimeout = 10;

    protected ?int $httpCode;

    protected ?string $response;

    protected bool $sslVerifyPeer = false;

    protected int $timeout = 15;

    protected string $userAgent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36';

    protected string $serviceUrl;

    public function __construct(string $serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;
    }

    /**
     * @param string $path
     * @return $this
     * @throws Exception
     * @noinspection CurlSslServerSpoofingInspection
     */
    public function request(string $path): Transport
    {
        $ch = curl_init();
        if (!$ch)
        {
            throw new Exception('Failed to initialize a cURL session');
        }
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->sslVerifyPeer);
        curl_setopt($ch, CURLOPT_URL,$this->serviceUrl . $path);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $this->response = curl_exec($ch);
        $this->httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($this->httpCode !== 200)
        {
            throw new Exception('HTTP status code: ' . $this->httpCode);
        }

        if (curl_errno($ch) === 28)
        {
            throw new Exception('Timeout');
        }
        curl_close($ch);

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHttpCode(): ?int
    {
        return $this->httpCode;
    }

    /**
     * @return string|null
     */
    public function getResponse(): ?string
    {
        return $this->response;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setConnectTimeout(int $value): Transport
    {
        $this->connectTimeout = $value;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setTimeout(int $value): Transport
    {
        $this->timeout = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setUserAgent(string $value): Transport
    {
        $this->userAgent = $value;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function setSslVerifyPeer(bool $value): Transport
    {
        $this->sslVerifyPeer = $value;

        return $this;
    }
}
