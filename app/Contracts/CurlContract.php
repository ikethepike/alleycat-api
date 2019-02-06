<?php

namespace AlleyCat\Contracts;

interface CurlContract
{
    /**
     * Carry out a get request.
     *
     * @param string $url
     * @param array  $headers
     *
     * @return Illuminate\Collection
     */
    public function get(string $url, array $headers = null);

    /**
     * Carry out a post request.
     *
     * @param string $url
     * @param array  $headers
     * @param array  $postdata
     *
     * @return Illuminate\Collection
     */
    public function post(string $url, array $postdata = [], array $headers = null);

    /**
     * Undocumented function.
     *
     * @param string $url
     * @param array  $headers
     */
    public function execute(string $url, array $headers, bool $post = false, array $postdata = null);
}
