<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Http\Requests\CourseAddToCartRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Course;
use App\Models\Sale;
use Cart;
use Str;

class CourseService
{
    use UploadTrait;

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreCourseRequest $request
     *
     * @return array|bool
     */
    public function store(StoreCourseRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store(TypeEnum::COURSES->value, 'public');
            return $data;
        }
        return false;
    }

    /**
     * Handle update data event to models.
     *
     * @param Course $sale
     * @param UpdateCourseRequest $request
     *
     * @return array|bool
     */
    public function update(Course $course, UpdateCourseRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($course->image);
            $data['image'] = $request->file('image')->store(TypeEnum::COURSES->value, 'public');
        }else {
            $data['image'] = $course->image;
        }

        return $data;
    }

    /**
     * Add To Cart Action
     *
     * @param CourseAddToCartRequest $request
     * @return void
     */
    public function addToCart(CourseAddToCartRequest $request): void
    {
        $course = Course::findOrFail($request->id);

        $data = [
            'id' => Str::random(16),
            'name' => $course->title,
            'price' => $course->price,
            'amount' => 1,
            'image' => asset("/storage/{$course->image}"),
            'option' => [
                'target_table' => 'courses',
                'id' => $course->id,
            ],
        ];

        if(Cart::isNotEmpty()) {
            Cart::truncate();
        }

        Cart::add(false, $data);
    }

    public function delete(Course $course)
    {
        $this->remove($course->image);
    }
}
