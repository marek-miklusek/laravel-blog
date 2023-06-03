<?php
     
function search_expression($request, $post)
{
    $word_count = 15;
    $teaser = str_ireplace($request, '<span class="bg-yellow-300">'.$request.'</span>', $post->teaser());

    if (stripos($teaser, $request)) {
        return $teaser;
    }

    $words = array_filter(explode(' ', $post->body));

    foreach ($words as $index => $current_word) {
        if (stristr($current_word, $request) !== false) {
            $start = max(0, $index - $word_count);
            $end = min(count($words) - 1, $index + $word_count);
            $extracted_words = array_slice($words, $start, $end - $start + 1);
            $extracted_phrase = implode(' ', $extracted_words);

            return str_ireplace($request, '<span class="bg-yellow-300">'.$request.'</span>', $extracted_phrase);
        }
    }
}

 