<?php

namespace App\Nova;


use Everestmx\BelongsToManyField\BelongsToManyField;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

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
        'id',
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

            Image::make('Feature Image', 'image'),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Excerpt')
                ->rules('required'),

            Trix::make('Body')
                ->hideFromIndex()
                ->rules('require',),

            Slug::make('slug'),

            Boolean::make('Feature', 'is_featured'),

            MorphToMany::make('Authors', 'authors', User::class)
                ->fields(function (){
                    return [
                        Boolean::make('Lead Author', 'is_lead')
                    ];
                })
                ->searchable(),

            morphToMany::make('Tags', 'tags', Tag::class),

            BelongsToMany::make('Categories', 'categories', Category::class)
                ->searchable(),

            BelongsTo::make('Status', 'status', PostStatus::class),

            MorphMany::make('Comments'),

            BelongsToManyField::make('Categories', 'categories', Category::class),

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

}
