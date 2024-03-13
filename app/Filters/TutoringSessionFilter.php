<?php

namespace App\Filters;

class TutoringSessionFilter extends Filter
{
    // index-review
    /**
     * Filter by name field.
     *
     * @param  mixed  $term
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function search($term = null)
    {
        $this->when($term, function ($query, $term) {
            $query->where('comment', 'LIKE', "%$term%")
                  ->orWhereHas('tutor', function ($q) use ($term) {
                      $q->where('name', 'LIKE', "%$term%");
                  })
                  ->orWhereHas('student', function ($q) use ($term) {
                      $q->where('name', 'LIKE', "%$term%");
                  });
                });


        return $this;
    }
}
