<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MinifyHtmlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return Response
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (
            $this->isHtmlResponse($response)
            && env('APP_ENV') === 'production'
            && env('APP_DEBUG') === false
        ) {
            $content = $response->getContent();

            $minifiedContent = $this->minifyHtml($content);

            $response->setContent($minifiedContent);
        }

        return $response;
    }

    /**
     * Check if the response contains HTML content.
     *
     * @param  Response  $response
     * @return bool
     */
    private function isHtmlResponse($response)
    {
        $contentType = $response->headers->get('Content-Type');
        return strpos($contentType, 'text/html') !== false;
    }

    /**
     * Minify HTML content.
     *
     * @param  string  $content
     * @return string
     */
    private function minifyHtml($content)
    {
        $search = array(
            '/\>[^\S ]+/s',  // Remove whitespaces after tags
            '/[^\S ]+\</s',  // Remove whitespaces before tags
            '/(\s)+/s'       // Shorten multiple whitespace sequences
        );

        $replace = array(
            '>',
            '<',
            '\\1'
        );

        return preg_replace($search, $replace, $content);
    }
}
