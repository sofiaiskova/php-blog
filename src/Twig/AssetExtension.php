<?php

declare(strict_types=1);

namespace Blog\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Psr\Http\Message\ServerRequestInterface;

class AssetExtension extends AbstractExtension
{
    private $request;
    
    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }


    public function getFunctions()
    {
        return [
            new TwigFunction('asset_url', [$this, 'getAssetUrl']),
            new TwigFunction('url', [$this, 'getAssetUrl']),
            new TwigFunction('base_url', [$this, 'getBaseUrl'])
        ];
    }

    public function getAssetUrl(string $path): string 
    {
        return $this->getBaseUrl() . $path;
    }

    public function getBaseUrl(): string 
    {
        return 'http://localhost:8000/';
    }

    
}
    