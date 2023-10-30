<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class YoutubeUrl implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $id = $this->extract_youtube_id($value);

        set_error_handler(function () {}, E_WARNING);
        $headers = get_headers('https://www.youtube.com/oembed?format=json&url=http://www.youtube.com/watch?v=' . $id);
        restore_error_handler();

        if (!is_array($headers)) {
            $fail("Видео по такой ссылке не найдено. Проверьте ссылку на видео");
        }

        $err_flag = strpos($headers[0], '200') ? 200 : 404;

        if ($err_flag !== 200) {
            $fail("Видео по такой ссылке не найдено. Проверьте ссылку на видео");
        }
    }

    function extract_youtube_id($youtube_url)
    {
        $id = false;

        $parts = parse_url($youtube_url);

        if ($parts) {
            if ($parts['path'] == '/watch') {
                parse_str($parts['query'], $vars);
                $id = $vars['v'] ?? null;
            } else {
                if ($parts['host'] == 'youtu.be') {
                    $id = substr($parts['path'], 1);
                }
            }
        }

        return $id;
    }
}
