<?php

namespace AlleyCat\Repositories;

use AlleyCat\Contracts\CurlContract;

class CurlRepository implements CurlContract
{
    private $retries = 3;

    /**
     * Carry out a get request.
     *
     * @param string $url
     * @param array  $headers
     *
     * @return Illuminate\Collection
     */
    public function get(string $url, array $headers = null)
    {
        return $this->execute($url, []);
    }

    /**
     * Carry out a post request.
     *
     * @param string $url
     * @param array  $headers
     * @param array  $postdata
     *
     * @return Illuminate\Collection
     */
    public function post(string $url, array $postdata = [], array $headers = null)
    {
        return $this->execute($url, $headers, true, $postdata);
    }

    /**
     * Undocumented function.
     *
     * @param string $url
     * @param array  $headers
     */
    public function execute(string $url, array $headers, bool $post = false, array $postdata = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, $post);

        // Add any custom headers
        if ($headers) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        try {
            $data = curl_exec($ch);
        } catch (\Exception $e) {
            throw new Exception('Error Processing Request', 1);
        }

        // Let's add a retry on failure
        $retry = 0;

        while (28 === curl_errno($ch) && $retry < $this->retries) {
            $data = curl_exec($ch);
            ++$retry;
        }

        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return collect([
            'body'   => json_decode($data),
            'status' => $code,
            'url'    => $url,
        ]);
    }
}
