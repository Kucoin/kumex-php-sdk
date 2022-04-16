<?php

namespace KuMEX\SDK\Tests;

use KuMEX\SDK\PublicApi\Symbol;

class SymbolTest extends TestCase
{

    protected $apiClass    = Symbol::class;
    protected $apiWithAuth = false;

    /**
     * @dataProvider apiProvider
     * @param Symbol $api
     * @throws \KuMEX\SDK\Exceptions\BusinessException
     * @throws \KuMEX\SDK\Exceptions\HttpException
     * @throws \KuMEX\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetTicker(Symbol $api)
    {
        $data = $api->getTicker('XBTUSDM');
        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('sequence', $data);
        $this->assertArrayHasKey('symbol', $data);
        $this->assertArrayHasKey('size', $data);
        $this->assertArrayHasKey('price', $data);
        $this->assertArrayHasKey('bestBidSize', $data);
        $this->assertArrayHasKey('bestAskSize', $data);
        $this->assertArrayHasKey('ts', $data);
    }

    /**
     * @dataProvider apiProvider
     * @param Symbol $api
     * @throws \KuMEX\SDK\Exceptions\BusinessException
     * @throws \KuMEX\SDK\Exceptions\HttpException
     * @throws \KuMEX\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetLevel2Snapshot(Symbol $api)
    {
        $data = $api->getLevel2Snapshot('XBTUSDM');
        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('sequence', $data);
        $this->assertArrayHasKey('symbol', $data);
        $this->assertArrayHasKey('asks', $data);
        $this->assertArrayHasKey('bids', $data);
    }

    /**
     * @dataProvider apiProvider
     * @param Symbol $api
     * @throws \KuMEX\SDK\Exceptions\BusinessException
     * @throws \KuMEX\SDK\Exceptions\HttpException
     * @throws \KuMEX\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetLevel3Snapshot(Symbol $api)
    {
        $data = $api->getLevel3Snapshot('XBTUSDM');
        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('sequence', $data);
        $this->assertArrayHasKey('symbol', $data);
        $this->assertArrayHasKey('asks', $data);
        $this->assertArrayHasKey('bids', $data);
    }

    /**
     * @dataProvider apiProvider
     * @param Symbol $api
     * @throws \KuMEX\SDK\Exceptions\BusinessException
     * @throws \KuMEX\SDK\Exceptions\HttpException
     * @throws \KuMEX\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetV2Level3Snapshot(Symbol $api)
    {
        $data = $api->getV2Level3Snapshot('XBTUSDM');
        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('sequence', $data);
        $this->assertArrayHasKey('symbol', $data);
        $this->assertArrayHasKey('asks', $data);
        $this->assertArrayHasKey('bids', $data);
        $this->assertArrayHasKey('ts', $data);
    }

    /**
     * @dataProvider apiProvider
     * @param Symbol $api
     * @throws \KuMEX\SDK\Exceptions\BusinessException
     * @throws \KuMEX\SDK\Exceptions\HttpException
     * @throws \KuMEX\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetLevel2Message(Symbol $api)
    {
        $data = $api->getLevel2Message('XBTUSDM', 1, 100);
        $this->assertInternalType('array', $data);
        foreach ($data as $item) {
            $this->assertArrayHasKey('symbol', $item);
            $this->assertArrayHasKey('sequence', $item);
            $this->assertArrayHasKey('change', $item);
        }
    }

    /**
     * @dataProvider apiProvider
     * @param Symbol $api
     * @throws \KuMEX\SDK\Exceptions\BusinessException
     * @throws \KuMEX\SDK\Exceptions\HttpException
     * @throws \KuMEX\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetLevel3Message(Symbol $api)
    {
//        $data = $api->getLevel3Message('XBTUSDM', 1, 100);
//        $this->assertInternalType('array', $data);
//        foreach ($data as $item) {
//            $this->assertArrayHasKey('symbol', $item);
//            $this->assertArrayHasKey('sequence', $item);
//            $this->assertArrayHasKey('orderId', $item);
//            $this->assertArrayHasKey('type', $item);
//        }
    }

    /**
     * @dataProvider apiProvider
     * @param Symbol $api
     * @throws \KuMEX\SDK\Exceptions\BusinessException
     * @throws \KuMEX\SDK\Exceptions\HttpException
     * @throws \KuMEX\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetTradeHistory(Symbol $api)
    {
        $data = $api->getTradeHistory('XBTUSDM');
        $this->assertInternalType('array', $data);
        foreach ($data as $item) {
            $this->assertArrayHasKey('sequence', $item);
            $this->assertArrayHasKey('tradeId', $item);
            $this->assertArrayHasKey('takerOrderId', $item);
            $this->assertArrayHasKey('makerOrderId', $item);
            $this->assertArrayHasKey('price', $item);
        }
    }

    /**
     * @dataProvider apiProvider
     * @param Symbol $api
     * @throws \KuMEX\SDK\Exceptions\BusinessException
     * @throws \KuMEX\SDK\Exceptions\HttpException
     * @throws \KuMEX\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetLevel2Depth20(Symbol $api)
    {
        $data = $api->getLevel2Depth20('XBTUSDM');

        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('symbol', $data);
        $this->assertArrayHasKey('sequence', $data);
        $this->assertArrayHasKey('asks', $data);
        $this->assertInternalType('array', $data['asks']);
        $this->assertInternalType('array', $data['bids']);
    }

    /**
     * @dataProvider apiProvider
     * @param Symbol $api
     * @throws \KuMEX\SDK\Exceptions\BusinessException
     * @throws \KuMEX\SDK\Exceptions\HttpException
     * @throws \KuMEX\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetLevel2Depth100(Symbol $api)
    {
        $data = $api->getLevel2Depth100('XBTUSDM');

        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('symbol', $data);
        $this->assertArrayHasKey('sequence', $data);
        $this->assertArrayHasKey('asks', $data);
        $this->assertInternalType('array', $data['asks']);
        $this->assertInternalType('array', $data['bids']);
    }
}