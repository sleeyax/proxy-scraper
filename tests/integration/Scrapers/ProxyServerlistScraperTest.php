<?php declare(strict_types = 1);

namespace Vantoozz\ProxyScraper\IntegrationTests\Scrapers;

use Vantoozz\ProxyScraper\HttpClient\GuzzleHttpClient;
use Vantoozz\ProxyScraper\IntegrationTests\IntegrationTest;
use Vantoozz\ProxyScraper\Scrapers\ProxyServerlistScraper;
use GuzzleHttp\Client as GuzzleClient;

/**
 * Class TopProxysScraper
 * @package Vantoozz\ProxyScraper\Scrapers
 */
final class ProxyServerlistScraperTest extends IntegrationTest
{
    /**
     * @test
     */
    public function it_works(): void
    {
        $httpClient = new GuzzleHttpClient(new GuzzleClient([
            'connect_timeout' => 6,
            'timeout' => 6,
        ]));
        $scrapper = new ProxyServerlistScraper($httpClient);

        $proxies = iterator_to_array($scrapper->get());
        static::assertGreaterThanOrEqual(100, count($proxies));
    }
}
