<?php
     
function search_expression($request, $post)
{
    $word_count = 15;
    $request = explode(' ', $request);
    $teaser = str_ireplace($request[0], '<span class="bg-yellow-300">'.$request[0].'</span>', $post->teaser());

    if (stripos($teaser, $request[0])) {
        return $teaser;
    }

    $words = array_filter(explode(' ', $post->body));

    foreach ($words as $index => $current_word) {
        if (stristr($current_word, $request[0]) !== false) {
            $start = max(0, $index - $word_count);
            $end = min(count($words) - 1, $index + $word_count);
            $extracted_words = array_slice($words, $start, $end - $start + 1);
            $extracted_phrase = implode(' ', $extracted_words);

            return str_ireplace($request[0], '<span class="bg-yellow-300">'.$request[0].'</span>', $extracted_phrase);
        }
    }
}

 