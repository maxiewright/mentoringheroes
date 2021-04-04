<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use OptimistDigital\MultiselectField\Multiselect;

class Post extends Resource
{

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Post::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')
                ->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Image::make('Featured Image', 'image_path')
            ->disk('public')
            ->path('post-images')
                ->storeAs(function (Request $request) {
                    return $request->image_path->getClientOriginalName();
                })
                ->creationRules('required'),

            Trix::make('Body')
                ->hideFromIndex()
                ->rules('required'),


            Boolean::make('Featured', 'is_featured'),

            Boolean::make('Published', 'is_published'),

            Date::make('Published On', 'published_at')->format('DD MMM YYYY'),

            //MultiSelect Fields
            Multiselect::make('Authors', 'authors')
                ->belongsToMany(User::class)
                ->required(),

            Multiselect::make('Tags', 'tags')
                ->belongsToMany(Tag::class)
                ->required(),

            Multiselect::make('Categories', 'categories')
                ->belongsToMany(Category::class)
                ->required(),

            MorphMany::make('Comments'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Posts';

}
